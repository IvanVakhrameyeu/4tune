<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index():View
    {
        return view('page.register');
    }

    public function register()
    {

    }
}
