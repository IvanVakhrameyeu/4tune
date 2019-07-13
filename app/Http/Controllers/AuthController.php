<?php

namespace App\Http\Controllers;

use App\user;
use App\wallet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index():View
    {
        return view('page.login');
    }
    public function loginAction(Request $request):RedirectResponse
    {


        if ($request->has('from')){
            return redirect($request->get('from'));
        }
        return redirect()->route('home');
    }
    public function logout()
    {

    }

    public function loginBeta(Request $request)
    {
        // Get information about user.
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($data, TRUE);

        $network = $user['network'];

        // Find user in DB.
        $userData = user::where('email', $user['email'])->first();

        // Check exist user.
        if (isset($userData->id)) {
            setcookie('user_identity', $user['identity'], time() + 3600 * 24 * 7, '/');
            // Check user status.
            if ($userData->status) {

                // Make login user.
                //   Auth::loginUsingId($userData->id, TRUE);

            } // Wrong status.
            else {
                \Session::flash('flash_message_error', trans('interface.AccountNotActive'));
            }

            return Redirect::back();
        } // Make registration new user.
        else {
            // Create new user in DB.

            $newUser = user::create([
                'uid' => $user['identity'],
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
            wallet::create([
                'user_id' => $newUser->id,
                'balance' => 0,
                'type' => 'dollar',
            ]);
            setcookie('user_identity', $user['identity'], time() + 3600 * 24 * 7, '/');

            // Make login user.  хз для чего ниже, но потом посмотреть
            // Auth::loginUsingId($newUser->id, TRUE);
            // \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

            return Redirect::back();
        }
    }
}
