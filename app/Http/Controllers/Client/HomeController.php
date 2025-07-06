<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Book\IBookService;
use App\Interfaces\Services\Slider\ISliderService;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends ClientController
{
    protected IBookService $bookService;
    protected ISliderService $sliderService;

    public function __construct(IBookService $bookService, ISliderService $sliderService){
        $this->bookService = $bookService;
        $this->sliderService = $sliderService;
    }
    public function index() {
        $books = $this->bookService->getAll();
        $sliders = $this->sliderService->getAll();
        return $this->getView('home.index', [
            'books' => $books,
            'sliders' => $sliders,
        ]);
    }
}
