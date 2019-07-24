<?php

namespace App\Http\Controllers\SocialAuthorization;


use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;

class VkAuthController extends AuthController
{
    public function redirectToProvider()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('vkontakte')->user();

        return response()->json($user);
    }
}