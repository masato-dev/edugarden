<?php
namespace App\Interfaces\Repositories\Page;

use App\Implementations\Repositories\BaseRepository;
use App\Implementations\Repositories\Page\IPageRepository;
use App\Models\Page;
class PageRepository extends BaseRepository implements IPageRepository {
    public function __construct(Page $model) {
        parent::__construct($model);
    }
}