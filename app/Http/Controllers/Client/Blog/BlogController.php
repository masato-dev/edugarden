<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Blog\IBlogService;
use Illuminate\Http\Request;

class BlogController extends ClientController
{
    protected IBlogService $blogService;
    public function __construct(IBlogService $blogService) {
        $this->blogService = $blogService;
    }

    public function index(Request $request) {
        return $this->getView("blog.index");
    }

    public function detail(Request $request) {
        $slug = $request->route("slug");
        $blog = $this->blogService->getBy(["slug" => $slug])->first();
        if(empty($blog)) {
            return abort(404);
        }

        return $this->getView("blog.detail", ["blog" => $blog]);
    }
}
