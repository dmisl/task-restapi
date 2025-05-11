<?php

namespace App\Services;

use App\Models\Position;
use Illuminate\Http\Exceptions\HttpResponseException;

class PositionService
{
    public function getAll()
    {
        $positions = Position::all();

        if(!$positions)
        {
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'message' => 'Positions not found',
                ], 404)
            );
        }

        return $positions;
    }
}