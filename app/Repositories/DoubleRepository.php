<?php


namespace App\Repositories;


use App\DoubleGame;
use App\DoubleGameBet;

class DoubleRepository
{
    public function start()
    {
        $this->checkGame();
        //$this->changeStatusBet();

    }

    /***
     *
     */
    private function checkGame()
    {
        $game = DoubleGame::where([
            ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
        ])->first();
        if ($game) {
            DoubleGame::where([
                ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
            ])->update(['status' => DoubleGame::DOUBLE_GAME_STATUS_CLOSED]);
        }
        $this->createGame();
    }

    /***
     * @return mixed
     */
    private function getIdGame()
    {
        $game = DoubleGame::where([
            ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
        ])->first();
            return $game->id;
    }

    /***
     * create game
     */
    private function createGame()
    {
        DoubleGame::create([
            'name' => 'это лишнее',
            'status' => DoubleGame::DOUBLE_GAME_STATUS_PENDING,
            'game_hash' => 'это хэш',
            'game_salt' => 'это соль',
            'game_number' => mt_rand(0, 14),
        ]);
    }

    /***
     * change status money game
     */
    private function changeStatusBet()
    {
        DoubleGameBet::where([
            ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
        ])->update(['status' => DoubleGame::DOUBLE_GAME_STATUS_CLOSED]);
    }

    /***
     * @param $amount
     * @param $color
     * @param $userId
     */
    public function depositMoney($amount, $color, $userId)
    {
        $gameId = $this->getIdGame();
        $deposit = DoubleGameBet::where([
            ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
            ['anticipated_event', '=', $color],
            ['user_id', '=', $userId],
            ['game_id', '=', $gameId],
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
        $gameId = $this->getIdGame();
        DoubleGameBet::create([
            'anticipated_event' => $color,
            'amount' => $amount,
            'status' => 'тут статус, победил или нет',
            'user_id' => $userId,
            'game_id' => $gameId,
        ]);
    }
}
