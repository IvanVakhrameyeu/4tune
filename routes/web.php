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

/* ================Pages============= */
Route::get('/','MainController@index')->name('home');
//
//
///* ============Actions============== */
//
///* ------------Nvuti---------------- */
//Route::get('/nvuti/setBet','NvutiController@setBet');
//
//
///* Auth */
Route::get('/login/{provider}', "Auth\LoginController@redirectToProvider");
Route::get('/login/{provider}/callback', "Auth\LoginController@handleProviderCallback");
Route::get('/logout', "Auth\LoginController@logout");
Route::get('/getUser', 'MainController@getUser');


Route::get('/getHash', 'NvutiController@getHash');
Route::post('/setBet', 'NvutiController@setBet');

//
//Route::middleware('auth')->group(function (){
//    Route::get('/double','DoubleController@index');
//    Route::get('/jackpot','JackpotController@index');
//    Route::get('/nvuti','NvutiController@index')->name('nvuti');
//    Route::get('/profile','ProfileController@indexAction');
//});

