<?php
namespace App\Implementations\Repositories\Book;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Book\IBookRepository;
use App\Models\Book;
class BookRepository extends BaseRepository implements IBookRepository {
    public function __construct(Book $model) {
        parent::__construct($model);
    }

    public function getAll(array $options = []) {
        return parent::getAll(array_merge($options, [
            'orderBy' => ['created_at' => 'desc'],
        ]));
    }
}