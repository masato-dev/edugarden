<?php

namespace App\Http\Controllers\Donate;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Implementations\Services\Donate\IDonateService;
use Illuminate\Http\Request;

class DonateController extends ClientController
{
    protected IDonateService $donateService;

    public function __construct(IDonateService $donateService) {
        $this->donateService = $donateService;
    }

    public function index(Request $request) {
        $this->setMetadata(
            title: __(key: 'Dâng hiến'), 
            description: __(key: "Trang dâng hiến của " . env('APP_NAME')), 
            keywords: __(key: "Dâng hiến")
        );
        return $this->getView('donate.index');
    }
}
