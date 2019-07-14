<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        if (!empty($_COOKIE['user_name'])) {
            $userData = user::where('user_name', $_COOKIE['user_name'])->first();
            if (!isset($userData->id)) {
                setcookie('user_name', '', time() + 1, '/');
            }
        }

        return view('page.index');
    }

    public function games()
    {
        return view('games');
    }
}
