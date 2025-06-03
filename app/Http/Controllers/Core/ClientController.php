<?php

namespace App\Http\Controllers\Core;

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
        return view(config('const.clients.views.root') . $path, array_merge([
            'metaTitle' => $this->metaTitle,
            'metaDescription' => $this->metaDescription,
            'metaKeywords' => $this->metaKeywords,
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
