<?php


namespace App\Repositories;


use App\JackpotGame;
use App\JackpotGameBet;

class JackpotRepository
{
    public $ticketMin;
    public $ticketMax;

    public function start()
    {
        $winNumber = $this->setAndGetWinNumber();

    }

    public function depositMoney($amount, $roomNumber, $user)
    {
        $user->withdrawFloat($amount);
        $userId = $user->id;

        $this->createBet($amount, $roomNumber, $userId);
    }

    private function createBet($amount, $roomNumber, $userId)
    {
        $game = $this->getGame($roomNumber);
        $gameId = $game->id;

        $range = $this->getLastRangeNumber($gameId);

        if (!empty($range['tickets_max_range'])) {
            $min = $range['tickets_max_range'] + 1;
            $max = $amount + $min - 1;
        } else {
            $min = 0;
            $max = $amount + $min - 1;
        }
        JackpotGameBet::create([
            'tickets_min_range' => $min,
            'tickets_max_range' => $max,
            'amount' => $amount,
            'room_number' => $roomNumber,
            'status' => 'тут статус, победил или нет',
            'user_id' => $userId,
            'game_id' => $gameId,
        ]);

        $this->ticketMin=$min;
        $this->ticketMax=$max;
    }

    /***
     * @param $roomNumber
     * @return mixed
     */
    private function getGame($roomNumber)
    {
        $game = JackpotGame::where([
            ['status', '=', JackpotGame::JACKPOT_GAME__STATUS_PENDING],
            ['room_number', '=', $roomNumber],
        ])->first();
        if ($game) {
            return $game;
        } else {
            $this->createGame($roomNumber);
            return $this->getGame($roomNumber);
        }
    }

    /***
     * create game without win number because we don't know how much players buy tickets
     * @param $roomNumber
     */
    private function createGame($roomNumber)
    {
        JackpotGame::create([
            'status' => JackpotGame::JACKPOT_GAME__STATUS_PENDING,
            'room_number' =>$roomNumber,
        ]);
    }

    /***
     * @return int
     */
    private function setAndGetWinNumber()
    {
        $game = JackpotGame::where([
            ['status', '=', JackpotGame::JACKPOT_GAME__STATUS_PENDING],
        ])->first();

        $max = $this->getLastRangeNumber($game->id);

        $winNumber = mt_rand(0, $max);
        $game->update(['game_number' => $winNumber]);

        return $winNumber;
    }

    private function getLastRangeNumber($gameId)
    {
        $gameBet = JackpotGameBet::where([
            ['game_id', '=', $gameId],
        ])->orderBy('id', 'desc')->first();

        if ($gameBet) {
            return ['tickets_max_range' => $gameBet->tickets_max_range];
        } else {
            return ['tickets_min_range' => 0];
        }
    }
}
