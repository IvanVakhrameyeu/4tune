<?php

namespace App\Http\Controllers;

use App\User;
use App\Vk;
use App\Wallet;
use config\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Hash;
use Redirect;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        //TODO basic auth
    }

    public function login($user)
    {
        Auth::login($user);
    }

    public function logout()
    {
        Auth::logout();
    }
}
