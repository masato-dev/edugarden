<?php
namespace App\Implementations\Repositories\Blog;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Blog\IBlogRepository;
use App\Models\Blog;
class BlogRepository extends BaseRepository implements IBlogRepository {
    public function __construct(Blog $model) {
        parent::__construct($model);
    }
}