<?php

namespace App\Http\Controllers;

use App\NvutiGame;
use App\Repositories\NvutiRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Hash;

class NvutiController extends Controller
{
    private $nvutiRepository;

    public function __construct()
    {
        $this->nvutiRepository = new NvutiRepository();
    }

    /***
     * @return View
     */
    public function index(): View
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id;
            $hash = NvutiRepository::getNewHash($userId);
        }

        return view('components.nvuti', compact('hash'));
    }

    /**
     * @Route("/setBet", name="nvutiBet")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function setBet(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $user->wallet->refreshBalance();
        $balance = $user->balanceFloat;

        if(!$request->has('chance') || !$request->has('amount') || !$request->has('stake')) {
            $hash = NvutiRepository::getNewHash($userId);
            return response()->json(['success' => false, 'hash' => $hash, 'balance' => $balance]);
        }

        $chance = $request->input('chance');
        $amount = $request->input('amount');
        $stake = $request->input('stake');

        if ($amount > $balance) {
            $hash = NvutiRepository::getNewHash($userId);
            return response()->json(['success' => false, 'hash' => $hash, 'balance' => $balance]);
        }

        $result = $this->nvutiRepository->setBet($user, $chance, $amount, $stake);

        return response()->json($result);
    }
}
