<?php

namespace App\Http\Controllers\Ajax\Book;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use App\Interfaces\Services\Book\IBookService;
use App\Trait\CrudBehaviour;
use Illuminate\Http\Request;

class BookController extends ApiController
{
    use CrudBehaviour;
    protected IBookService $bookService;
    public function __construct(IBookService $bookService) {
        $this->bookService = $bookService;
    }

    public function index(Request $request) {
        return $this->_index($request, $this->bookService);
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        if(!$keyword)
            return $this->success(__('Search books successfully'), $this->bookService->getAll());
        return $this->success(__('Search books successfully'), $this->bookService->autoComplete($keyword, 'title'));
    }
}
