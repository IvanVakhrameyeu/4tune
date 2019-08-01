<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('layouts.index');
    }

    public function games()
    {
        return view('layouts.games');
    }

    public function getUser()
    {
        return [Auth::user(),Auth::user()->balanceFloat];
    }
}
