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

            $userData = User::where('user_name', $_COOKIE['user_name'])->first();
            if (isset($userData->id)) {  // если пользователь существует, то проверка на существование игры и добавление\изменение данных игры
                $hash = $this->game($userData);
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
        $userData = User::where('user_name', $_COOKIE['user_name'])->first();
        $nvuti_game = Nvuti_game::where([
            ['user_id', '=', $userData->id],
            ['status', '=', 'в процессе'], // статус изменить
        ])->first();


        $number = $this->getChance($request['amount'], $request['chance']);
        if ($request['stake'] == 'less')
            $result = $this->isNumberMore($nvuti_game->game_number, 0, $number['min']); // from and to промежуток
        else
            $result = $this->isNumberMore($nvuti_game->game_number, $number['max'], 999999); // from and to промежуток


        $newGame = Nvuti_game::find($nvuti_game->id);
        $newGame->status = 'сыграно';
        $newGame->name = ($result == 0 ? 'проиграл' : 'выиграл');
        $newGame->save();

        //$result =$this->createNewGame($userData);

        return response()->json(['success' => true, 'hash' => $this->createNewGame($userData)]);
        //return
    }

    /**
     * получаем шанс победы
     * @param $amount
     * @param $chance
     * @return array (минимум, максимум, коэффициент победы)
     */
    private  function getChance($amount, $chance)
    {
        $win_amount = $amount / $chance * 100; // коэффициент полученных бабок
        $min = floor(($chance) / 100 * 999999);
        $max = floor(999999 - ($chance) / 100 * 999999);
        // ('0-' + min);
        //(max + '-999999');

        return ['min' => $min, 'max' => $max, 'win_amount' => $win_amount];
    }

    /*** создание новой игры
     * @param $userData
     * @return mixed
     */
    private function createNewGame($userData){
        $data = $this->newData(); // получение сгенерированных солей и числа
        $hash = Hash::make($data['game_salt'] . $data['rand_number'] . $data['game_salt2']);
        Nvuti_game::create([
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
    public function game($userData) // проверка на существование игры
    {
        $nvuti_game = Nvuti_game::where([
            ['user_id', '=', $userData->id],
            ['status', '=', 'в процессе'], // статус изменить
        ])->first();
        // Check exist user.
        // если пользователь существует и игра в процессе, то генерятся новые 2 соли и число
        if (isset($nvuti_game->id)) {
            $data = $this->newData(); // получение сгенерированных солей и числа
            $newGame = Nvuti_game::find($nvuti_game->id);
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
            Nvuti_game::create([
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

    private function isNumberMore($number, $from, $to)
    {  // проверка на принадлежность к промежутку игрока
        if ($number >= $from && $number <= $to)
            return 1;
        return 0;
    }

    /***
     * генерация двух солей и числа
     * @return array['game_salt', 'game_salt2', 'rand_number']
     */
    private function newData()
    {
        $game_salt = Hash::make(str_random(10));
        $game_salt2 = Hash::make(str_random(10));
        $rand_number = mt_rand(0, 999999);
        return ['game_salt' => $game_salt, 'game_salt2' => $game_salt2, 'rand_number' => $rand_number];
    }


}
