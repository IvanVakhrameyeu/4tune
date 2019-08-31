<?php


namespace App\Repositories;


use App\Events\JackpotFirstEvent;
use App\Events\JackpotSecondEvent;
use App\Events\JackpotThirdEvent;
use App\JackpotGame;
use App\JackpotGameBet;
use App\Jobs\PlayJackpotGame;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JackpotRepository
{
    public $ticketMin;
    public $ticketMax;

    public $winAmount;
    public $ticketWin;
    public $name;
    public $userWin;

    public function start($roomNumber)
    {
        $this->setWinNumber($roomNumber);
        $this->winPlayer($roomNumber);

        switch ($roomNumber) {
            case '1':
                JackpotFirstEvent::dispatch($this->name, $this->winAmount, $this->ticketWin);
                break;
            case '2':
                JackpotSecondEvent::dispatch($this->name, $this->winAmount, $this->ticketWin);
                break;
            case '3':
                JackpotThirdEvent::dispatch($this->name, $this->winAmount, $this->ticketWin);
                break;
            default:
                return;
        }
    }

    public function depositMoney($amount, $roomNumber, $user)
    {
        $user->withdrawFloat($amount);
        $userId = $user->id;

        $this->createBet($amount, $roomNumber, $userId);


        $game = $this->getGame($roomNumber);
        $gameId = $game->id;
        $this->checkCountBetGames($gameId, $roomNumber);
    }

    private function createBet($amount, $roomNumber, $userId)
    {
        $game = $this->getGame($roomNumber);
        $gameId = $game->id;

        $range = $this->getLastRangeNumber($gameId);

        if ($range != 0) {
            $min = $range + 1;
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

        $this->ticketMin = $min;
        $this->ticketMax = $max;
    }

    /***
     * @param $roomNumber
     * @return void
     */
    private function setWinNumber($roomNumber)
    {
        $game = $this->getGame($roomNumber);

        $max = $this->getLastRangeNumber($game->id);

        if ($max == 0) { // этой проверки не должно быть т.к игра может запуститься, только если есть ставка
            return;
        }
        $this->ticketWin = mt_rand(0, $max);
        $game->update(['game_number' => $this->ticketWin]);
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
     * @param $gameId
     * @return int
     */
    private function getLastRangeNumber($gameId)
    {
        $gameBet = JackpotGameBet::where([
            ['game_id', '=', $gameId],
        ])->orderBy('id', 'desc')->first();

        if ($gameBet) {
            return $gameBet->tickets_max_range;
        } else {
            return 0;
        }
    }

    /***
     * if count bets by more then 2 then start game
     * @param $gameId
     * @param $roomNumber
     */
    private function checkCountBetGames($gameId, $roomNumber)
    {
        $gameBet = JackpotGameBet::select(DB::raw('max(id)'))
            ->where('game_id', '=', $gameId)
            ->groupBy('user_id')
            ->get();
        if (count($gameBet) > 1) {
            switch ($roomNumber) {
                case '1':
                    dispatch(new PlayJackpotGame(1))
                        ->onQueue('jackpotGameProcessing')
                        ->delay(Carbon::now()->addSeconds(5));
                    break;
                case '2':
                    dispatch(new PlayJackpotGame(2))
                        ->onQueue('jackpotGameProcessing')
                        ->delay(Carbon::now()->addSeconds(5));
                    break;
                case '3':
                    dispatch(new PlayJackpotGame(3))
                        ->onQueue('jackpotGameProcessing')
                        ->delay(Carbon::now()->addSeconds(5));
                    break;
                default:
                    return;
            }
        }
    }

    /***
     * find win player and set value for $winAmount,$name
     * @param $roomNumber
     */
    private function winPlayer($roomNumber)
    {

        $game = $this->getGame($roomNumber);
        $gameId = $game->id;

        $this->ticketWin = $game->game_number;

        if (!isset($this->ticketWin)) {
            return;
        }

        $sumBet = JackpotGameBet::where([
            ['game_id', '=', $gameId],
        ])->sum('amount');

        $this->updatePlayers($roomNumber);

        $userWin = JackpotGameBet::where([
            ['game_id', '=', $gameId],
            ['status', '=', 'win'],
        ])->first();

        $user = $this->getUser($userWin->user_id);

        $this->changeStatusGame($roomNumber);

        $sumToDeposit = $sumBet - ($sumBet * 10 / 100);

        $this->name = $user->name;
        $this->winAmount = $sumToDeposit;
        $user->depositFloat($sumToDeposit);
    }

    /***
     * return players why win
     * @param $roomNumber
     */
    private function updatePlayers($roomNumber)
    {
        $game = $this->getGame($roomNumber);
        $gameId = $game->id;

        JackpotGameBet::where(
            'game_id', '=', $gameId)
            ->where(function ($query) {
                $query->where('tickets_min_range', '<', $this->ticketWin)
                    ->orWhere('tickets_min_range', '=', $this->ticketWin);
            })->where(function ($query) {
                $query->where('tickets_max_range', '>', $this->ticketWin)
                    ->orWhere('tickets_max_range', '=', $this->ticketWin);
            })
            ->update(['status' => 'win']);
        JackpotGameBet::where([
            ['game_id', '=', $gameId],
            ['status', '!=', 'win'],
        ])->update(['status' => 'lose']);
    }

    /***
     * change game to closed
     * @param $roomNumber
     */
    private function changeStatusGame($roomNumber)
    {
        $game = JackpotGame::where([
            ['status', '=', JackpotGame::JACKPOT_GAME__STATUS_PENDING],
            ['room_number', '=', $roomNumber],
        ])->first();
        if ($game) {
            $game->update(['status' => JackpotGame::JACKPOT_GAME_STATUS_CLOSED]);
        }
        $this->createGame($roomNumber);
    }

    /***
     * @param $userId
     * @return mixed
     */
    private function getUser($userId)
    {
        $user = User::where([
            ['id', '=', $userId],
        ])->first();
        return $user;
    }

    /***
     * create game without win number because we don't know how much players buy tickets
     * @param $roomNumber
     */
    private function createGame($roomNumber)
    {
        JackpotGame::create([
            'status' => JackpotGame::JACKPOT_GAME__STATUS_PENDING,
            'room_number' => $roomNumber,
        ]);
    }
}
