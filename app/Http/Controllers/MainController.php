<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //if (!empty($_COOKIE['user_token']))
         //   if (isset($_COOKIE['user_token']) && empty(user::where('remember_token', '=', $_COOKIE['user_token']))) {
          //      setcookie('user_token', '', time() - 1, '/');

            //}
        if(empty($_SESSION['id']))
        if (isset($_COOKIE['user_identity'])) {
            $user = user::getUser($_COOKIE['user_identity']); // спросить почему массив, и как правильно получить нужные записи
            foreach ($user as $use) {
                $_SESSION['id'] = $use->id;
                $_SESSION['user_name'] = $use->user_name;
                $_SESSION['user_name'] = $use->user_name;
                $_SESSION['photo'] = $use->photo;
                break;
            }
        }
        return view('page.index');
    }

    public function game()
    {
        return view('game');
    }
}
