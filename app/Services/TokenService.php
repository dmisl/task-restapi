<?php

namespace App\Services;

use App\Models\RegistrationToken;

class TokenService
{
    public function generate()
    {
        $token = bin2hex(random_bytes(64));
        
        RegistrationToken::create([
            'token' => $token,
            'expires_in' => now()->addMinutes(40),
        ]);

        return $token;
    }
}