<?php

namespace App\Http\Controllers;

use App\Events\JackpotRateFirstEvent;
use App\Events\JackpotRateSecondEvent;
use App\Events\JackpotRateThirdEvent;
use App\JackpotGame;
use App\JackpotGameBet;
use App\Jobs\PlayJackpotGame;
use App\Repositories\JackpotRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class JackpotController extends Controller
{
    public function index(): View
    {
        return view('components.jackpot');
    }


    public function setBetJackpot(Request $request)
    {// добавить проверку авторизованности
        $user = Auth::user();
        $user->wallet->refreshBalance();

        $balance = $user->balanceFloat;

        $request->validate([
            'roomNumber' => 'required|numeric|between:1,3',
        ]);
        $roomNumber = $request->input('roomNumber');


        $request->validate([
            'amount' => 'required|numeric|min:'.pow(10, $roomNumber),
        ]);
        $amount = $request->input('amount');

        if ($amount > $balance || $amount < pow(10, $roomNumber)) {
            return response()->json();
        }

        $JackpotRepository = new JackpotRepository();
        ($JackpotRepository)->depositMoney($amount, $roomNumber, $user);
        $ticketRangeS = $JackpotRepository->ticketMin . '-' . $JackpotRepository->ticketMax;

        switch ($roomNumber) {
            case '1':
                JackpotRateFirstEvent::dispatch($user->avatar, $user->name, $amount, $ticketRangeS);
                break;
            case '2':
                JackpotRateSecondEvent::dispatch($user->avatar, $user->name, $amount, $ticketRangeS);
                break;
            case '3':
                JackpotRateThirdEvent::dispatch($user->avatar, $user->name, $amount, $ticketRangeS);
                break;
        }
        return response()->json();
    }

    public function getJackpotRotatePlayers(Request $request)
    {
        $request->validate([
            'roomNumber' => 'required|numeric|between:1,3',
        ]);
        $roomNumber = $request->input('roomNumber');

        $game = JackpotGame::where([
            ['status', '=', JackpotGame::JACKPOT_GAME__STATUS_PENDING],
            ['room_number', '=', $roomNumber],
        ])->first();

        if (!$game) {
            return [];
        }
        $players = JackpotGameBet::join('users', 'users.id', '=', 'jackpot_game_bets.user_id')
            ->select('tickets_min_range', 'tickets_max_range', 'amount', 'users.name', 'users.avatar')
            ->where([
                ['game_id', '=', $game->id]
            ])->get();

        return $players;
    }

    public function getJackpotData()
    {
        $maxJackpotToday = JackpotGameBet::where('created_at', '>=', Carbon::now()->startOfDay()->toDateTimeString())
            ->max('amount');
        $countGamesToday = JackpotGame::where('created_at', '>=', Carbon::now()->startOfDay()->toDateTimeString())
            ->count();

        $maxJackpot = JackpotGameBet::max('amount');

        return ['maxJackpotToday' => $maxJackpotToday, 'countGamesToday' => $countGamesToday, 'maxJackpot' => $maxJackpot];
    }

    public function getLastJackpotAndWinner(Request $request)
    {
        $request->validate([
            'roomNumber' => 'required|numeric|between:1,3',
        ]);
        $roomNumber = $request->input('roomNumber');

        $game = JackpotGame::where([
            ['room_number', '=', $roomNumber],
            ['status', '=', JackpotGame::JACKPOT_GAME_STATUS_CLOSED],
        ])->orderBy('id', 'desc')->first();

        if (!$game) {
            return [];
        }
        $playerBet = JackpotGameBet::where([
            ['game_id', '=', $game->id],
            ['status', '=', 'win'],
        ])->first();

        if (!$playerBet) {
            return [];
        }
        $player = User::where([
            ['id', '=', $playerBet->user_id],
        ])->first();

        if (!$player) {
            return [];
        }
        $sum = JackpotGameBet::where([
            ['game_id', '=', $game->id],
        ])->sum('amount');
        $lastSum = $sum - ($sum * 10 / 100);
        return ['player' => $player, 'lastSum' => $lastSum, 'game' => $game];
    }

    /***
     * @return array
     */
    public function getBankInfo()
    {
        $gameFirst = JackpotGame::where([
            ['room_number', '=', 1],
            ['status', '=', JackpotGame::JACKPOT_GAME__STATUS_PENDING],
        ])->orderBy('id', 'desc')->first();

        if ($gameFirst) {
            $playerBetFirst = JackpotGameBet::where([
                ['game_id', '=', $gameFirst->id],
            ])->sum('amount');
        } else {
            $playerBetFirst = 0;
        }
        $gameSecond = JackpotGame::where([
            ['room_number', '=', 2],
            ['status', '=', JackpotGame::JACKPOT_GAME__STATUS_PENDING],
        ])->orderBy('id', 'desc')->first();

        if ($gameSecond) {
            $playerBetSecond = JackpotGameBet::where([
                ['game_id', '=', $gameSecond->id],
            ])->sum('amount');
        } else {
            $playerBetSecond = 0;
        }
        $gameThird = JackpotGame::where([
            ['room_number', '=', 3],
            ['status', '=', JackpotGame::JACKPOT_GAME__STATUS_PENDING],
        ])->orderBy('id', 'desc')->first();

        if ($gameThird) {
            $playerBetThird = JackpotGameBet::where([
                ['game_id', '=', $gameThird->id],
            ])->sum('amount');
        } else {
            $playerBetThird = 0;
        }
        return ['playerBetFirst' => $playerBetFirst, 'playerBetSecond' => $playerBetSecond, 'playerBetThird' => $playerBetThird];
    }

    public function getCurrentJackpot(Request $request)
    {
        $request->validate([
            'roomNumber' => 'required|numeric|between:1,3',
        ]);
        $roomNumber = $request->input('roomNumber');

        $game = JackpotGame::where([
            ['room_number', '=', $roomNumber],
            ['status', '=', JackpotGame::JACKPOT_GAME__STATUS_PENDING],
        ])->orderBy('id', 'desc')->first();

        if ($game) {
            $sum = JackpotGameBet::where([
                ['game_id', '=', $game->id],
            ])->sum('amount');
        }
        else{
            $sum=0;
        }
        return $sum;
    }
}
