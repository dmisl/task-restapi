<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    protected TokenService $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function index()
    {
        $this->tokenService->generate();
    }
}
