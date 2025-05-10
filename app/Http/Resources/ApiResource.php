<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'success' => $this->resource['success'],
        ];
    }
}
