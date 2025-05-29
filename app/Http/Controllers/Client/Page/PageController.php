<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Implementations\Services\Page\IPageService;
use Illuminate\Http\Request;

class PageController extends ClientController
{
    protected IPageService $pageService;
    public function __construct(IPageService $pageService) {
        $this->pageService = $pageService;
    }

    public function detail(Request $request) {
        $slug = $request->route('slug');
        $page = $this->pageService->getBy(['slug' => $slug])->first();
        if($page == null) {
            return abort(404);
        }
        return $this->getView('page.detail', ['page' => $page]);
    }
}
