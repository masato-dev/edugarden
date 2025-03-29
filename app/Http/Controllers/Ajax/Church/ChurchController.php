<?php

namespace App\Http\Controllers\Ajax\Church;

use App\Http\Controllers\Core\ApiController;
use App\Interfaces\Services\Church\IChurchService;
use Illuminate\Http\Request;

class ChurchController extends ApiController
{
    protected IChurchService $churchService;
    public function __construct(IChurchService $churchService) {
        $this->churchService = $churchService;
    }

    public function index(Request $request) {
        $records = $this->churchService->getAll();
        return $this->success(__('Retrive Churches Successfully'), $records);
    }
}
