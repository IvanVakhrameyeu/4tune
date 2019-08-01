<?php


namespace App\Repositories;


use App\NvutiGame;

use Hash;

class NvutiRepository
{
    /***
     * @param $user
     * @param $chance
     * @param $amount
     * @param $stake
     * @return array
     */
    public function setBet($user, $chance, $amount, $stake)
    {
        $userId = $user->id;
        $nvutiGame = $this->getNvutiGame($userId);
        $number = $this->getMinMaxSegment($chance);

        $numberForMin = $number['min'];
        $numberForMax = $number['max'];

        if ($stake == 'less') {
            $result = $this->isPointBelongSegment($nvutiGame->game_number, NvutiGame::NVUTI_GAME_GAME_MIN, $numberForMin);
        } else {
            $result = $this->isPointBelongSegment($nvutiGame->game_number, $numberForMax, NvutiGame::NVUTI_GAME_GAME_MAX);
        }

        if ($result == 0) {
            $user->withdrawFloat($amount);
        } else {
            $winAmount = $this->getWinAmount($amount, $chance);
            $user->depositFloat($winAmount);
        }
        $balance = $user->balanceFloat;

        $nvutiGame->status = NvutiGame::NVUTI_GAME_STATUS_CLOSED;
        $nvutiGame->name = ($result == 0 ? 'lose' : 'win');
        $nvutiGame->save();
        $hash = self::getNewHash($userId);

        return (['success' => true, 'hash' => $hash, 'balance' => $balance, '$stake'=>$stake]);
    }


    /***
     * @param $amount
     * @param $chance
     * @return float
     */
    private function getWinAmount($amount, $chance): float
    {
        $winAmount = $amount / $chance * 100;
        $winAmount -= $amount;

        return $winAmount;
    }

    /**
     * get min max of the segment
     * @param $chance
     * @return array (min, max)
     */
    private function getMinMaxSegment($chance)
    {
        $min = floor(($chance) / 100 * NvutiGame::NVUTI_GAME_GAME_MAX);
        $max = floor(NvutiGame::NVUTI_GAME_GAME_MAX - ($chance) / 100 * NvutiGame::NVUTI_GAME_GAME_MAX);

        return ['min' => $min, 'max' => $max];
    }

    /***
     * get current game
     * @param $userId
     * @return mixed
     */
    static private function getNvutiGame($userId)
    {
        return NvutiGame::where([
            ['user_id', '=', $userId],
            ['status', '=', NvutiGame::NVUTI_GAME_STATUS_PENDING],
        ])->first();
    }

    /***
     * @param $userId
     * @return mixed
     */
    static public function getNewHash($userId)
    {
        $currentGame = self::getNvutiGame($userId);
        $data = self::getNewData();

        if (!empty($currentGame)) {
            $currentGame->game_salt = $data['gameSalt'];
            $currentGame->game_hash = Hash::make($data['gameSalt'] . $data['randNumber']);
            $currentGame->game_number = $data['randNumber'];
            $currentGame->save();

            return $currentGame->game_hash;
        } else {
            $hash = Hash::make($data['gameSalt'] . $data['randNumber']);

            NvutiGame::create([
                'name' => '',
                'status' => NvutiGame::NVUTI_GAME_STATUS_PENDING,
                'game_hash' => $hash,
                'game_salt' => $data['gameSalt'],
                'game_number' => $data['randNumber'],
                'user_id' => $userId,
            ]);
            return $hash;
        }
    }

    /***
     * Does a point belong to a segment?
     * @param $number
     * @param $from
     * @param $to
     * @return int
     */
    private function isPointBelongSegment($number, $from, $to)
    {
        if ($number >= $from && $number <= $to) {
            return 1;
        }
        return 0;
    }

    /***
     * generation new sole and randomNumber
     * @return array['game_salt', 'gameSalt2', 'randNumber']
     */
    static private function getNewData()
    {
        $gameSalt = Hash::make(str_random(10));
        $randNumber = mt_rand(0, 999999);
        return ['gameSalt' => $gameSalt, 'randNumber' => $randNumber];
    }

}
