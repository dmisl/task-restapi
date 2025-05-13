<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationToken extends Model
{
    protected $fillable = [
        'token', 'used', 'expires_at'
    ];

    public $timestamps = false;
    protected $primaryKey = 'token';
    public $incrementing = false;
    protected $keyType = 'string';
}
