<?php

namespace App\Http\Controllers\Ajax\Donate;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiController;
use App\Implementations\Services\Donate\IDonateService;
use App\Trait\CrudBehaviour;
use Illuminate\Http\Request;

class DonateController extends ApiController
{
    use CrudBehaviour;
    protected IDonateService $service;

    public function __construct(IDonateService $service) {
        $this->service = $service;
    }

    public function store(Request $request) {
        return $this->_store($request, $this->service);
    }
}
