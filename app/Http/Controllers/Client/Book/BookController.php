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

    public function index(Request $request) {
        $this->setMetadata(__('Sách'), __('Danh sách sản phẩm của Edugarden'), __('Edugarden'));
        return $this->getView('book.index');
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        $books = $keyword 
            ? $this->bookService->autoComplete($keyword, 'title') 
            : $this->bookService->getAll();
        $this->setMetadata(__('Tìm kiếm'), __('Kết quả tìm kiếm của Edugarden'), __('Edugarden'));
        return $this->getView('book.search', [
            'books' => $books,
            'keyword' => $keyword,
        ]);
    }
    public function detail(Request $request) {
        $slug = $request->route('slug');
        if(!$slug)
            return abort(404);

        $book = $this->bookService->getBy(['slug' => $slug])->first();
        if(!$book)
            return abort(404);

        $this->setMetadata($book->title, $book->description, $book->title);

        $relatedBooks = $this->bookService->getAll(['perpage' => 5]);

        return $this->getView('book.detail', [
            'book' => $book,
            'relatedBooks' => $relatedBooks,
        ]);
    }
}
