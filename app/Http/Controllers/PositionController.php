<?php

namespace App\Http\Controllers;

use App\Http\Resources\PositionIndexResource;
use App\Services\PositionService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected PositionService $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    public function index()
    {
        return response()->json(new PositionIndexResource([
            'positions' => $this->positionService->getAll()
        ]), 200);
    }
}
