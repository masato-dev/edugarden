<?php

namespace App\Http\Controllers\Core;

use App\Enums\AlertTypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    abstract public function getView(string $path);

    public function redirectToWithMessage(string $to, string $message, ?string $alertType = null) {
        return redirect()
            ->route($to)
            ->with('message', $message)
            ->with('alertType', $alertType ?? AlertTypes::$success);
    }

    public function redirectBackWithMessage(string $message, ?string $alertType = null) {
        return redirect()
            ->back()
            ->with('message', $message)
            ->with('alertType', $alertType ?? AlertTypes::$success);
    }
}
