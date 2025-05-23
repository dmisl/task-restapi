<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionIndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'positions' => PositionResource::collection($this->resource['positions']),
        ];
    }
}
