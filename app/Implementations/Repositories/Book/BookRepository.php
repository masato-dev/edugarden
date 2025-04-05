<?php
namespace App\Implementations\Repositories\Book;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Book\IBookRepository;
use App\Models\Book;
class BookRepository extends BaseRepository implements IBookRepository {
    public function __construct(Book $model) {
        parent::__construct($model);
    }
}