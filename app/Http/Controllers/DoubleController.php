<?php

namespace App\Http\Controllers;

use App\DoubleGame;
use App\Events\DoubleRateEvent;
use App\Repositories\DoubleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class DoubleController extends Controller
{

    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setBetDouble(Request $request)
    {
        $user = Auth::user();
        $user->wallet->refreshBalance();

        $balance = $user->balanceFloat;

        $request->validate([
            'amount' => 'required|numeric|between:1,1000',
            'color' => 'required|string|in:green,black,red',
        ]);

        $amount = $request->input('amount');
        $color = $request->input('color');

        if ($amount > $balance || $amount > 1000 || $amount < 1) {
            return response()->json();
        }

        (new DoubleRepository())->depositMoney($amount, $color, $user);

        DoubleRateEvent::dispatch($user->avatar, $user->name, $amount, $color);

        return response()->json(['color' => 'df']);
    }

    public function getHistories()
    {
        $histories = DoubleGame::select('game_number')->
        orderBy('id', 'DESC')->get()->take(11);
        $histories->shift();
        return $histories;
    }
}
