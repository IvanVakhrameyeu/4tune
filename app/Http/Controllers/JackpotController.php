<?php

namespace App\Http\Controllers;

use App\Repositories\JackpotRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class JackpotController extends Controller
{
    public function index():View{
        return view('components.jackpot');
    }


    public function setBetJackpot(Request $request)
    {
        $user = Auth::user();
        $user->wallet->refreshBalance();

        $balance = $user->balanceFloat;

        $request->validate([
            'amount' => 'required|numeric|between:1,1000',
            'roomNumber' => 'required|numeric|between:1,3',
        ]);

        $amount = $request->input('amount');
        $roomNumber = $request->input('roomNumber');

        if ($amount > $balance || $amount > 1000 || $amount < pow(10,$roomNumber)) {
            return response()->json();
        }

        (new JackpotRepository())->depositMoney($amount, $roomNumber, $user);

       // DoubleRateEvent::dispatch($user->avatar, $user->name, $amount, $color);

        return response()->json();
    }
}
