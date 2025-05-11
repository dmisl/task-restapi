<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function getPaginatedUsers(int $count, int $page): LengthAwarePaginator
    {
        $paginator = User::with('position')->orderBy('id', 'asc')->paginate($count, ['*'], 'page', $page);
        
        if($paginator->isEmpty())
        {
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'message' => 'Page not found',
                ], 404)
            );
        }

        return $paginator;
    }
}