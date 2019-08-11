<?php

namespace App\Http\Controllers;

use App\Jobs\PlayDoubleGame;
use Illuminate\Http\Request;

use Illuminate\View\View;

class DoubleController extends Controller
{
    public function index(): View
    {
        return view('pages.game.double');
    }
}
