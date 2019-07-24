<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','MainController@index')->name('home');
Route::get('/games','MainController@games')->name('games');
Route::get('/games/double','DoubleController@index');
Route::get('/games/jackpot','JackpotController@index');
Route::get('/games/nvuti','NvutiController@index')->name('nvuti');
Route::get('/games/nvuti/setBet','NvutiController@setBet');

Route::get('/profile','ProfileController@indexAction');




Route::get('/vk', 'AuthController@vk');


$namespace = 'SocialAuthorization';

Route::post('/provider/vk', "$namespace\\VkAuthController@redirectToProvider");
Route::get('/provider/vk', "$namespace\\VkAuthController@handleProviderCallback");



Route::middleware('guest')->group(function (){

    Route::post('/ulogin', 'AuthController@loginBeta');

    //Route::get('/login', 'AuthController@index')->name('login');
    //Route::post('/login', 'AuthController@login')->name('login.action');

    //Route::get('/register', 'RegistrationController@index')->name('registration');
    //Route::post('/register', 'RegistrationController@register')->name('registration.action');

});

Route::get('/logout', 'AuthController@logout');

Route::middleware('auth')->group(function (){

});


