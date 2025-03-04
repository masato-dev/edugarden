<?php

namespace App\View\Components\Book\Listing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookListing extends Component
{
    /**
     * Create a new component instance.
     */
    /**
     * List of books
     * @var \App\Models\Book[]
     */
    private array $books;
    private string $title;
    public function __construct(array $books, string $title)
    {
        $this->books = $books;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book.listing.book-listing', [
            'books' => $this->books,
            'title'=> $this->title,
        ]);
    }
}
