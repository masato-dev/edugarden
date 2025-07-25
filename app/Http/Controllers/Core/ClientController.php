<?php

namespace App\Http\Controllers\Core;

use App\Interfaces\Services\AppSetting\IAppSettingService;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ClientController extends BaseController
{
    protected ?string $metaTitle = null;
    protected ?string $metaDescription = null;
    protected ?string $metaKeywords = null;

    public function getView(string $path, array $data = []) {
        $appSettingService = app(IAppSettingService::class);
        $activeSetting = $appSettingService->getBy(['is_active' => true])->first();
        return view(config('const.clients.views.root') . $path, array_merge([
            'metaTitle' => $this->metaTitle ?? $activeSetting->meta_title,
            'metaDescription' => $this->metaDescription ?? $activeSetting->meta_description,
            'metaKeywords' => $this->metaKeywords ?? $activeSetting->meta_keywords,
        ], $data));
    }

    public function setMetadata(string $title, string $description, string $keywords) {
        $this->metaTitle = $title;
        $this->metaDescription = $description;
        $this->metaKeywords = $keywords;

        SEOMeta::setTitle($this->metaTitle);
        SEOMeta::setDescription($this->metaDescription);
        SEOMeta::setKeywords($this->metaKeywords);

        OpenGraph::setTitle($this->metaKeywords);
        OpenGraph::setDescription($this->metaDescription);
        OpenGraph::setSiteName(env('APP_NAME'));
        OpenGraph::setUrl(env('APP_URL'));
        
        JsonLd::setTitle($this->metaTitle);
        JsonLd::setDescription($this->metaDescription);
        JsonLd::setUrl(env('APP_URL'));
    }
}
