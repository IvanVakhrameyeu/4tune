<?php


namespace App\Repositories;


use App\DoubleGame;
use App\DoubleGameBet;

class DoubleRepository
{
    public function start()
    {
        $this->changeStatus();
    }

    /***
     * change status current game
     */
    private function changeStatus()
    {
        $games = DoubleGameBet::where([
            ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
        ])->get();
        $games->status = DoubleGame::DOUBLE_GAME_STATUS_CLOSED;
        $games->save();
    }

    /***
     * @param $amount
     * @param $color
     * @param $userId
     */
    public function depositMoney($amount, $color, $userId)
    {
        $deposit = DoubleGameBet::where([
            ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
            ['anticipated_event', '=', $color],
            ['user_id', '=', $userId],
        ])->first();

        if ($deposit) {
            $deposit->amount += $amount;
            $deposit->save();
        } else {
            $this->createBet($amount, $color, $userId);
        }
    }

    private function createBet($amount, $color, $userId)
    {
        DoubleGameBet::create([
            'anticipated_event' => $color,
            'amount' => $amount,
            'status' => DoubleGame::DOUBLE_GAME_STATUS_PENDING,
            'user_id' => $userId,
        ]);
    }


}
