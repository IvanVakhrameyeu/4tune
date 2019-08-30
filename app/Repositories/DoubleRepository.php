<?php


namespace App\Repositories;


use App\Console\Commands\DoublePushServer;
use App\DoubleGame;
use App\DoubleGameBet;
use App\Events\DoubleEvent;
use App\User;


class DoubleRepository
{
    private $winNumber;

    /***
     *
     */
    public function start()
    {
        $this->updatePlayers();

        $this->makeMoneyWinPlayer();

        $this->changeStatusGame();

        DoubleEvent::dispatch($this->winNumber);
    }

    /***
     * deposit money win players
     */
    public function makeMoneyWinPlayer()
    {
        $game = $this->getGame();
        $gameId = $game->id;
        $players = DoubleGameBet::where([
            ['game_id', '=', $gameId],
            ['status', '=', 'win'],
        ])->get();
        if (isset($players)) {
            $colorWin = $this->getColorWin();
            foreach ($players as $player) {

                $user = $players = User::where([ //wtf???
                    ['id', '=', $player->user_id],
                ])->first();
                if ($colorWin == 'green') {
                    $user->depositFloat($player->amount * 14);
                } else {
                    $user->depositFloat($player->amount * 2);
                }
            }
        }
    }

    /***
     * change game to closed
     */
    private function changeStatusGame()
    {
        $game = DoubleGame::where([
            ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
        ])->first();
        if ($game) {
            $game->update(['status' => DoubleGame::DOUBLE_GAME_STATUS_CLOSED]);
        }
        $this->createGame();
    }

    /***
     * return players why win
     * @return mixed
     */
    private function updatePlayers()
    {
        $game = $this->getGame();
        $gameId = $game->id;
        $this->winNumber = $game->game_number;

        $winColor = $this->getColorWin();

        DoubleGameBet::where([
            ['game_id', '=', $gameId],
            ['anticipated_event', '=', $winColor],
        ])->update(['status' => 'win']);
        DoubleGameBet::where([
            ['game_id', '=', $gameId],
            ['anticipated_event', '!=', $winColor],
        ])->update(['status' => 'lose']);

    }

    /***
     * get color of random number
     * @return string
     */
    private function getColorWin()
    {
        $game = $this->getGame();
        switch ($game->game_number) {
            case 0:
                return DoubleGame::DOUBLE_GAME_COLOR_GREEN;
            case $game->game_number <= 7:
                return DoubleGame::DOUBLE_GAME_COLOR_RED;
            case $game->game_number >= 8:
                return DoubleGame::DOUBLE_GAME_COLOR_BLACK;
            default:
                break;
        }
    }

    /***
     * @return mixed
     */
    private function getGame()
    {
        $game = DoubleGame::where([
            ['status', '=', DoubleGame::DOUBLE_GAME_STATUS_PENDING],
        ])->first();
        if ($game) {
            return $game;
        } else {
            $this->createGame();
            return $this->getGame();
        }
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
     * @param $amount
     * @param $color
     * @param $user
     */
    public function depositMoney($amount, $color, $user)
    {
        $user->withdrawFloat($amount);
        $userId = $user->id;

        $game = $this->getGame();
        $gameId = $game->id;
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

    /***
     * @param $amount
     * @param $color
     * @param $userId
     */
    private function createBet($amount, $color, $userId)
    {
        $game = $this->getGame();
        $gameId = $game->id;
        DoubleGameBet::create([
            'anticipated_event' => $color,
            'amount' => $amount,
            'status' => 'тут статус, победил или нет',
            'user_id' => $userId,
            'game_id' => $gameId,
        ]);
    }
}
