<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends ClientController
{
    public function index() {
        return view($this->getView('home.index'));
    }
}
