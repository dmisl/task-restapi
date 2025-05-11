<?php

namespace App\Services;

use App\Models\Position;

class PositionService
{
    public function getPositions()
    {
        return Position::all();
    }
}