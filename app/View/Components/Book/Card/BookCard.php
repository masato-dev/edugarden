<?php

namespace App\View\Components\Book\Card;

use App\Models\Book;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookCard extends Component
{
    private Book $book;

    /**
     * Create a new component instance.
     */
    public function __construct(Book $book) {
        $this->book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book.card.book-card-item', [
            'book' => $this->book,
        ]);
    }
}

