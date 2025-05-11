<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'user' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'position_id' => $this->position_id,
                'position' => $this->position->name,
                'photo' => $this->photo
            ]
        ];
    }
}
