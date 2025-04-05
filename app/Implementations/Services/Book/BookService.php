<?php
namespace App\Implementations\Services\Book;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Book\IBookRepository;
use App\Interfaces\Services\Book\IBookService;
class BookService extends BaseService implements IBookService {
    public function __construct(IBookRepository $repository) {
        parent::__construct($repository);
    }
}