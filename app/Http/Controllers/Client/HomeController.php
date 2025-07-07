<?php

namespace App\Http\Controllers\Client;

use App\Enums\ModuleTypes;
use App\Http\Controllers\Core\ClientController;
use App\Implementations\Services\Page\IPageService;
use App\Interfaces\Services\AppSetting\IAppSettingService;
use App\Interfaces\Services\Blog\IBlogService;
use App\Interfaces\Services\Book\IBookService;
use App\Interfaces\Services\Slider\ISliderService;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends ClientController
{
    protected IAppSettingService $appSettingService;
    protected IBookService $bookService;
    protected ISliderService $sliderService;
    protected IBlogService $blogService;
    protected IPageService $pageService;

    public function __construct(
        IAppSettingService $appSettingService,
        IBookService $bookService,
        ISliderService $sliderService,
        IBlogService $blogService,
        IPageService $pageService
    ) {
        $this->appSettingService = $appSettingService;
        $this->bookService = $bookService;
        $this->sliderService = $sliderService;
        $this->blogService = $blogService;
        $this->pageService = $pageService;
    }
    public function index() {
        $activeSetting = $this->appSettingService->getBy(['is_active' => true])->first();
        if($activeSetting) {
            $rawSections = $activeSetting->sections;
            $sections = array_map(function ($section) {
                switch($section['module']) {
                    case ModuleTypes::BOOK:
                        return [
                            'type' => ModuleTypes::BOOK,
                            'title' => $section['title'] ?? null,
                            'data' => $this->bookService->getAll()
                        ];
                    
                    case ModuleTypes::SLIDER:
                        return [
                            'type' => ModuleTypes::SLIDER,
                            'title' => $section['title'] ?? null,
                            'data' => $this->sliderService->getAll()
                        ];

                    case ModuleTypes::BLOG:
                        return [
                            'type' => ModuleTypes::BLOG,
                            'title' => $section['title'] ?? null,
                            'data' => $this->blogService->getAll(['perpage' => 4])
                        ];

                    case ModuleTypes::PAGE:
                        return [
                            'type' => ModuleTypes::PAGE,
                            'title' => $section['title'] ?? null,
                            'data' => $this->pageService->getById($section['record'])
                        ];
                    
                    default:
                        return [
                            'type' => $section['module'],
                            'title' => $section['title'] ?? null,
                            'data' => $section['data'] ?? null
                        ];
                }
            }, $rawSections);

            return $this->getView('home.index', [
                'sections' => $sections,
            ]);
        }
    }
}
