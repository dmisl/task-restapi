<?php

namespace App\Http\Controllers;

use App\Http\Resources\TokenResource;
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
        return response()->json([
            new TokenResource([
                'token' => $this->tokenService->generate()
            ])
        ], 200);
    }
}
