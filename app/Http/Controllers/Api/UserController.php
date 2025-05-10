<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserIndexRequest;
use App\Http\Resources\ApiResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserIndexRequest $request)
    {
        return response()->json(new ApiResource([
            'success' => 'true'
        ]));
    }
}
