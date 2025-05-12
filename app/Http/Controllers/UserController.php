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

    public function index()
    {
        $users = $this->userService->getAll();
        $positions = $this->positionService->getAll();

        return view('index', compact('users', 'positions'));
    }
}
