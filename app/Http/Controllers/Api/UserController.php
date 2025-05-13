<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserIndexRequest;
use App\Http\Requests\UserShowRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserIndexResource;
use App\Http\Resources\UserShowResource;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

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

    public function show(UserShowRequest $request, $id)
    {
        $user = $this->userService->getUser($id);

        return response()->json(new UserShowResource($user), 200);
    }

    public function store(UserStoreRequest $request)
    {
        return $this->userService->create($request->all(), $request->header('token'));
        return response()->json([
            'success' => true,
            'required' => $request->all()
        ]);
    }
}
