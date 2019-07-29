<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider = null)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider = null)
    {
        $oauthUser = Socialite::driver($provider)->scopes(['email'])->user();

        $user = UserRepository::findOrCreateUserFromOAuth($oauthUser);

        Auth::login($user);

        return redirect($this->redirectTo);
    }

    public function logout()
    {
        Auth::logout();

        return redirect($this->redirectTo);
    }
}
