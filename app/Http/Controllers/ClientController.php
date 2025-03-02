<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends BaseController
{
    public function getView(string $path) {
        return config('const.clients.views.root') . $path;
    }
}
