<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationToken extends Model
{
    protected $fillable = [
        'token', 'used', 'expires_at'
    ];
}
