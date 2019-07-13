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
Route::get('/game','MainController@game');

Route::get('/profile','ProfileController@indexAction');

Route::middleware('guest')->group(function (){
    Route::get('/login', 'AuthController@index')->name('login');
    Route::post('/login', 'AuthController@login')->name('login.action');

    Route::get('/register', 'RegistrationController@index')->name('registration');
    Route::post('/register', 'RegistrationController@register')->name('registration.action');

});
Route::middleware('auth')->group(function (){
    Route::get('/logout', 'AuthController@logout');
});


Route::post('/ulogin', 'AuthController@loginBeta');
