<?php

namespace App\Http\Controllers;

use App\Nvuti_game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Hash;
use mysql_xdevapi\Session;
use function PHPSTORM_META\elementType;

class NvutiController extends Controller
{
    public function index(): View
    {
        if (!empty($_COOKIE['user_name'])) {// заменить проверку на авторизованность
            $userId = $this->getIdUser();
            if (isset($userId)) {  // если пользователь существует, то проверка на существование игры и добавление\изменение данных игры
                $hash = $this->getNewHash();
            } else {
                return redirect()->route('games'); // пользователя не существует или не авторизован, возврат к играм и вывод на экран о просьбе авторизации
            }
        }
        return view('page.game.nvuti', compact('hash'));
    }

    /**
     * @Route("/setBet", name="nvutiBet")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function setBet(Request $request)
    {
        $userId = $this->getIdUser();
        $nvutiGame = $this->getNvutiGame($userId);

        if (empty($request['chance']) || empty($request['stake'])) {
            $hash = $this->createNewGame($userId);
            return response()->json(['success' => false, 'hash' => $hash]);
        }

        $number = $this->getMinMaxSegment($request['chance']);
        if ($request['stake'] == 'less')
            $result = $this->isPointBelongSegment($nvutiGame->game_number, 0, $number['min']); // from and to промежуток
        else
            $result = $this->isPointBelongSegment($nvutiGame->game_number, $number['max'], 999999); // from and to промежуток


        $newGame = Nvuti_game::find($nvutiGame->id);
        $newGame->status = 'done';
        $newGame->name = ($result == 0 ? 'lose' : 'win');
        $newGame->save();
        $hash = $this->createNewGame($userId);
        return response()->json(['success' => true, 'hash' => $hash]);
    }

    /**
     * get min max of the segment
     * @param $chance
     * @return array (min, max)
     */
    private function getMinMaxSegment($chance)
    {
        $min = floor(($chance) / 100 * 999999);
        $max = floor(999999 - ($chance) / 100 * 999999);
        return ['min' => $min, 'max' => $max];
    }

    /***
     * @param $userId
     * @return mixed
     */
    private function createNewGame($userId)
    {
        $data = $this->getNewData();
        $hash = Hash::make($data['gameSalt'] . $data['randNumber'] . $data['gameSalt2']);
        Nvuti_game::create([
            'name' => '',
            'status' => 'plays',
            'game_hash' => $hash,
            'game_salt' => $data['gameSalt'],
            'game_salt2' => $data['gameSalt2'],
            'game_number' => $data['randNumber'],
            'user_id' => $userId,
        ]);
        return $hash;
    }

    /***
     * get user id
     * @return mixed
     */
    private function getIdUser()
    {
        $id = User::select('id')->where('user_name', $_COOKIE['user_name'])->first();
        if (!empty($id))
            return $id->id;
        else return null;
    }

    /***
     * get current game
     * @param $userId
     * @return mixed
     */
    private function getNvutiGame($userId)
    {
        return Nvuti_game::where([
            ['user_id', '=', $userId],
            ['status', '=', 'plays'],
        ])->first();
    }

    /***
     * create or update game data and getHash
     * @return mixed
     */
    public function getNewHash()
    {
        $userId = $this->getIdUser();

        $currentGame = $this->getNvutiGame($userId);
        if (!empty($currentGame)) {
            $currentGameId = $this->getNvutiGame($userId)->id;
            $data = $this->getNewData();
            $newGame = Nvuti_game::find($currentGameId);
            $newGame->game_salt = $data['gameSalt'];
            $newGame->game_salt2 = $data['gameSalt2'];
            $newGame->game_hash = Hash::make($data['gameSalt'] . $data['randNumber'] . $data['gameSalt2']);
            $newGame->game_number = $data['randNumber'];
            $newGame->save();
            return $newGame->game_hash;
        } else {
            $data = $this->getNewData();
            $hash = Hash::make($data['gameSalt'] . $data['randNumber'] . $data['gameSalt2']);
            Nvuti_game::create([
                'name' => '',
                'status' => 'plays',
                'game_hash' => $hash,
                'game_salt' => $data['gameSalt'],
                'game_salt2' => $data['gameSalt2'],
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
        if ($number >= $from && $number <= $to)
            return 1;
        return 0;
    }

    /***
     * generation new sole and randomNumber
     * @return array['game_salt', 'gameSalt2', 'randNumber']
     */
    private function getNewData()
    {
        $game_salt = Hash::make(str_random(10));
        $game_salt2 = Hash::make(str_random(10));
        $rand_number = mt_rand(0, 999999);
        return ['gameSalt' => $game_salt, 'gameSalt2' => $game_salt2, 'randNumber' => $rand_number];
    }


}
