<?php
namespace App\Implementations\Services\Blog;

use App\Implementations\Services\BaseService;
use App\Interfaces\Repositories\Blog\IBlogRepository;
use App\Interfaces\Services\Blog\IBlogService;
class BlogService extends BaseService implements IBlogService {
    public function __construct(IBlogRepository $repository) {
        parent::__construct($repository);
    }
}