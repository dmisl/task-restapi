<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $paginator = UserResource::collection($this->resource['users']);
        return [
            'success' => true,
            'page' => $paginator->currentPage(),
            'total_pages' => $paginator->lastPage(),
            'total_users' => $paginator->total(),
            'count' => $paginator->perPage(),
            'next_url' => $paginator->nextPageUrl() ? $paginator->nextPageUrl()."&count={$paginator->perPage()}" : null,
            'prev_url' => $paginator->previousPageUrl() ? $paginator->previousPageUrl()."&count={$paginator->perPage()}" : null,
            'users' => $paginator,
        ];
    }
}
