<?php

namespace App\Http\Controllers\Ajax\Blog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use App\Interfaces\Services\Blog\IBlogService;
use App\Trait\CrudBehaviour;
use Illuminate\Http\Request;

class BlogController extends ApiController {
    use CrudBehaviour;
    protected IBlogService $blogService;

    public function __construct(IBlogService $blogService) {
        $this->blogService = $blogService;
    }

    public function index(Request $request) {
        return $this->_index($request, $this->blogService);
    }
}
