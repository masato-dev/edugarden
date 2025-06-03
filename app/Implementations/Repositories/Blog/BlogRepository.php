<?php
namespace App\Implementations\Repositories\Blog;

use App\Implementations\Repositories\BaseRepository;
use App\Interfaces\Repositories\Blog\IBlogRepository;
use App\Models\Blog;
class BlogRepository extends BaseRepository implements IBlogRepository {
    public function __construct(Blog $model) {
        parent::__construct($model);
    }

    public function getAll(array $options = []) {
        $defaultOptions = [
            'orderBy' => ['created_at' => 'desc'],
        ];
        $mergedOptions = array_merge($defaultOptions, $options);
        return parent::getBy(['status' => 1], $mergedOptions);
    }
}