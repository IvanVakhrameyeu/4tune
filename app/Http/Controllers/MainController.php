<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            return view('layouts.games');
        }

        return view('layouts.promo-page');
    }

    public function games()
    {
        return view('layouts.games');
    }


    public function wallet()
    {


          $user = Auth::user();
          if(isset($user))
        $user->balance;
        /*/return var_dump($user);
          $wallet = $user->createWallet([
              'name' => 'Coin',
              'slug' => 'my-coin',
          ]);
          $wallet->deposit(100);*/


        return var_dump($user->balance);
    }



}
