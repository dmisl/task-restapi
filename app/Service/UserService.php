<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function getPaginatedUsers(int $count, int $page): LengthAwarePaginator
    {
        return User::with('position')->orderBy('id', 'asc')->paginate($count, ['*'], 'page', $page);
    }
}