<?php

namespace App\Services;

use App\Models\Position;

class PositionService
{
    public function getAll()
    {
        return Position::all();
    }
}