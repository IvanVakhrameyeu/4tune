<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NvutiController extends Controller
{
    public function index():View{
        return view('page.game.nvuti');
    }
    /**
     * @Route("/setBet", name="nvutiBet")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function setBet(Request $request)
    {
        if (!$this->getUser()) {
            return $this->json(['error' => 'Please log in!']);
        }
    }
}
