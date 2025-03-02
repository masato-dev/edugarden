<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Core\ClientController;
use Illuminate\Http\Request;

class HomeController extends ClientController
{
    public function index() {
        return view($this->getView('home.index'));
    }
}
