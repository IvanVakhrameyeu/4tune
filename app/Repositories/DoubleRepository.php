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
    }


}
