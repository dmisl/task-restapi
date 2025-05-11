<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserIndexRequest;
use App\Http\Resources\ApiResource;
use App\Http\Resources\UserIndexResource;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserIndexRequest $request)
    {
        $users = $this->userService->getPaginatedUsers($request->count ?? 5, $request->page ?? 1);

        return response()->json(new UserIndexResource([
            'users' => $users
        ]), 200);
    }
}
