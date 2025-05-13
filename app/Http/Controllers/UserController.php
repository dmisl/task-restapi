<?php

namespace App\Http\Controllers;

use App\Services\PositionService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;
    protected PositionService $positionService;

    public function __construct(UserService $userService, PositionService $positionService)
    {
        $this->userService = $userService;
        $this->positionService = $positionService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->getPaginatedUsers(6, $request->page ? $request->page : 1);
        $positions = $this->positionService->getAll();

        return view('index', compact('users', 'positions'));
    }
}
