<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Trait\JsonBehavior;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use JsonBehavior;
}
