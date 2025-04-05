<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Core\ClientController;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends ClientController
{
    public function index() {
        $books = Book::all();
        return $this->getView('home.index', [
            'books' => $books,
        ]);
    }
}
