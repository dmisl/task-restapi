<?php

namespace App\Service;

use App\Models\User;

class UserService
{
    public function getPaginatedUsers(int $count, int $page)
    {
        return User::with('position')->orderBy('id', 'asc')->paginate($count, ['*'], 'page', $page);
    }   
}