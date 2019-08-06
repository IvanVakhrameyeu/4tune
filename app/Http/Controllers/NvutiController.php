<?php

namespace App\Http\Controllers;

use App\Jobs\PlayNvutiGame;
use App\NvutiGame;
use App\Repositories\NvutiRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Hash;

class NvutiController extends Controller
{

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

        $request->validate([
            'chance' => 'required|integer|between:1,95',
            'amount' => 'required|numeric|between:1,1000',
            'stake' => 'required|string|in:less,more',
        ]);

        $chance = $request->input('chance');
        $amount = $request->input('amount');
        $stake = $request->input('stake');

        if ($amount > $balance) {
            $hash = NvutiRepository::getNewHash($userId);
            return response()->json(['hash' => $hash]);
        }

        // $result =  dispatch(new PlayNvutiGame($user,$chance, $amount, $stake));
        dispatch(new PlayNvutiGame($user,$chance, $amount, $stake));

        //$result = $this->nvutiRepository->setBet($user, $chance, $amount, $stake);

        //return response()->json($result);
        return response()->json('');
    }

    /***
     * @return mixed
     */
    public function getHash()
    {
        $userId = Auth::user()->id;
        $hash = NvutiRepository::getNewHash($userId);
        return $hash;
    }
}
