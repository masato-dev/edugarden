<?php

namespace App\Http\Controllers\Client\Book;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Book\IBookService;
use Illuminate\Http\Request;

class BookController extends ClientController
{
    protected IBookService $bookService;
    public function __construct(IBookService $bookService) {
        $this->bookService = $bookService;
    }
    public function detail(Request $request) {
        $slug = $request->route('slug');
        if(!$slug)
            return abort(404);

        $book = $this->bookService->getBy(['slug' => $slug])->first();
        if(!$book)
            return abort(404);

        return view($this->getView('book.detail'), [
            'book' => $book
        ]);
    }
}
