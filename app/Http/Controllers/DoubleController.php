<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

class DoubleController extends Controller
{
    public function index():View{
        return view('pages.game.double');
    }
}
