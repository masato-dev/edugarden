<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;

class ClientController extends BaseController
{
    public function getView(string $path, array $data = []) {
        return view(config('const.clients.views.root') . $path, $data);
    }
}
