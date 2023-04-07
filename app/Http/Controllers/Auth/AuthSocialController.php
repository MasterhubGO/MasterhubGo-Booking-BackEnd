<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthSocial\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialController extends Controller
{
    public function index($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialService $socialService, $provider)
    {
        $getUser = Socialite::driver($provider)->user();
        $user = $socialService->firstOrCreateUser($getUser);
        Auth::login($user);
        return redirect()->route('account');
    }
}
