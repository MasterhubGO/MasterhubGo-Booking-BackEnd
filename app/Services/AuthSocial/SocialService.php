<?php

namespace App\Services\AuthSocial;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialService
{
    public function firstOrCreateUser($user)
    {
        return User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'password' => Hash::make('123456789')
            ]
        );
    }
}
