<?php

namespace App\Http\Controllers;

use App\User;
use App\Vk;
use App\Wallet;
use config\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Hash;
use Redirect;

class AuthController extends Controller
{
    public function vk(Request $request)
    {
        if (!$_GET['code']) {
            exit('error code');
        }
        $token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id=' . Setting::Constants()['ID'] . '&redirect_uri=' . Setting::Constants()['URL'] . '&client_secret=' . Setting::Constants()['KEY'] . '&code=' . $_GET['code']), true);

        if (!$token) {
            exit('error token');
        }
        $data = json_decode(file_get_contents('https://api.vk.com/method/users.get?user_id=' . $token['user_id'] . '&access_token=' . $token['access_token'] . '&fields=uid,first_name,last_name,photo_big,sex,nickname' . '&v=5.52'), true);

        if (!$data) {
            exit('error data');
        }
        $userData = $data['response'][0];

        Auth::login($token['email']);
        //return $result;
        /*
        // Find user in DB.
        $userDataDB = User::where('email', $token['email'])->first();

        // Check exist user.
        if (isset($userDataDB->id)) {
            setcookie('user_name', $userData['id'], time() + 3600 * 24 * 7, '/');
            // Check user status.
            if ($userDataDB->is_active) {

                // Make login user.
                //   Auth::loginUsingId($userData->id, TRUE);

            } // Wrong status.
            else {
               }

            // return redirect()->route('home');
            return redirect()->back();
        } // Make registration new user.
        else {
            // Create new user in DB.

            $newUser = User::create([
                //  'uid' => $userData['identity'],
                  'vk_id' => $newVkUser['id'],
                'user_name' => $userData['id'],//$userData['nickname']==''?'test':$userData['nickname'],
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'photo' => $userData['photo_big']==null?"test-avatar.png":$userData['photo_big'],
                'email' => $token['email'],
                'password' => Hash::make(str_random(8)),
                'remember_token' =>$token['access_token'],
                'roles' => 'user',
                'is_active' => '1',
             //   'last_ip' => $request->ip()
            ]);
            Wallet::create([
                'user_id' => $newUser->id,
                'balance' => 0,
                'type' => 'dollar',
            ]);
        Vk::create([
 'user_id' => $newUser->id,
            ]);
            setcookie('user_name',$userData['id'], time() + 3600 * 24 * 7, '/');

            return redirect()->route('games');
        }*/
    }

    public function logout()
    {
        setcookie('user_name', '', time() + 1, '/');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function loginBeta(Request $request)
    {
        // Get information about user.
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($data, TRUE);

        $network = $user['network'];

        // Find user in DB.
        $userData = User::where('email', $user['email'])->first();

        // Check exist user.
        if (isset($userData->id)) {
            setcookie('user_name', $user['nickname'], time() + 3600 * 24 * 7, '/');
            // Check user status.
            if ($userData->is_active) {

                // Make login user.
                //   Auth::loginUsingId($userData->id, TRUE);

            } // Wrong status.
            else {
                \Session::flash('flash_message_error', trans('interface.AccountNotActive'));
            }

            // return redirect()->route('home');
            return redirect()->back();
        } // Make registration new user.
        else {
            // Create new user in DB.

            $newUser = User::create([
                //  'uid' => $user['identity'],
                'user_name' => $user['nickname'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'photo' => $user['photo'],
                // 'country' => $user['country'],
                'email' => $user['email'],
                'password' => Hash::make(str_random(8)),
                'remember_token' => $_POST['token'],
                'roles' => 'user',
                'is_active' => '1',
                'last_ip' => $request->ip()
            ]);
            Wallet::create([
                'user_id' => $newUser->id,
                'balance' => 0,
                'type' => 'dollar',
            ]);
            setcookie('user_name', $user['nickname'], time() + 3600 * 24 * 7, '/');

            // Make login user.  хз для чего ниже, но потом посмотреть
            // Auth::loginUsingId($newUser->id, TRUE);
            // \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

            return redirect()->back();
        }
    }


    /**
     * @return View
     */
    public function index(): View
    {
        return view('page.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function loginAction(Request $request): RedirectResponse
    {
        if ($request->has('from')) {
            return redirect($request->get('from'));
        }
        return redirect()->route('home');
    }
}
