<?php

namespace App\Http\Controllers\Core;

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
    }
}
