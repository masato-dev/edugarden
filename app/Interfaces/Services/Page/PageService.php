<?php
namespace App\Interfaces\Services\Page;

use App\Implementations\Repositories\Page\IPageRepository;
use App\Implementations\Services\BaseService;
use App\Implementations\Services\Page\IPageService;
class PageService extends BaseService implements IPageService {
    public function __construct(IPageRepository $repository) {
        parent::__construct($repository);
    }
}