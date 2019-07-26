<?php

namespace App\Http\Controllers;

use App\NvutiGame;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Hash;
use mysql_xdevapi\Session;

class NvutiController extends Controller
{
    public function index(): View
    {
        if (!empty($_COOKIE['user_name'])) {// заменить проверку на авторизованность

            $userData = User::where('user_name', $_COOKIE['user_name'])->first();
            if (isset($userData->id)) {  // если пользователь существует, то проверка на существование игры и добавление\изменение данных игры
                $hash = $this->game($userData);
            } else {
                return redirect()->route('games'); // пользователя не существует или не авторизован, возврат к играм и вывод на экран о просьбе авторизации
            }
        }
        return view('pages.game.nvuti', compact('hash'));
    }

    /**
     * @Route("/setBet", name="nvutiBet")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function setBet(Request $request)
    {
        $userData = User::where('user_name', $_COOKIE['user_name'])->first();
        $nvuti_game = NvutiGame::where([
            ['user_id', '=', $userData->id],
            ['status', '=', 'в процессе'], // статус изменить
        ])->first();

        $result = $this->isNumberMore($nvuti_game->game_number,5,10);
        $newGame = NvutiGame::find($nvuti_game->id);
        $newGame->status = 'сыграно';
        $newGame->name = ($result == 0 ? 'проиграл' : 'выиграл');
        $newGame->save();
        return redirect()->route('nvuti');
    }


    public function game($userData) // проверка на существование игры
    {
        $nvuti_game = NvutiGame::where([
            ['user_id', '=', $userData->id],
            ['status', '=', 'в процессе'], // статус изменить
        ])->first();
        // Check exist user.
        // если пользователь существует и игра в процессе, то генерятся новые 2 соли и число
        if (isset($nvuti_game->id)) {
            $data = $this->newData(); // получение сгенерированных солей и числа
            $newGame = NvutiGame::find($nvuti_game->id);
            $newGame->game_salt = $data['game_salt'];
            $newGame->game_salt2 = $data['game_salt2'];
            $newGame->game_hash = Hash::make($data['game_salt'] . $data['rand_number'] . $data['game_salt2']);
            $newGame->game_number = $data['rand_number'];
            $newGame->save();
            return $newGame->game_hash;
        } else {
            $data = $this->newData(); // получение сгенерированных солей и числа
            $userData = User::where('user_name', $_COOKIE['user_name'])->first(); // юсера получаем
            $hash = Hash::make($data['game_salt'] . $data['rand_number'] . $data['game_salt2']);
            NvutiGame::create([
                'name' => '',
                'status' => 'в процессе',
                'game_hash' => $hash,
                'game_salt' => $data['game_salt'],
                'game_salt2' => $data['game_salt2'],
                'game_number' => $data['rand_number'],
                'user_id' => $userData->id,
            ]);
            return $hash;
        }
    }

    private function isNumberMore($number,$from, $to)
    {  // проверка на принадлежность к промежутку игрока
            if ( $number  >= $from && $number <=$to)
                return 1;

        return 0;
    }
    /***
     * получение исходных данных
     * @return array['game_salt', 'game_salt2', 'rand_number']
     */
    private function newData()
    {
        $game_salt = Hash::make(str_random(10));
        $game_salt2 = Hash::make(str_random(10));
        $rand_number = mt_rand(1, 30);

        return ['game_salt' => $game_salt, 'game_salt2' => $game_salt2, 'rand_number' => $rand_number];
    }

    private function getNumber($salt1, $salt2, $hash, $from, $to)
    {

        for ($i = 1; $i < 1000000; $i++) {

            if (Hash::make($salt1 . $i . $salt2) == $hash)
                return $i;

            if ($i >= $from && $i <= $to) {
                return 0;
            }
        }
    }

}
