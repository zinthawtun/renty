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


Auth::routes();

Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', 'UserController@profile');

Route::post('profile', 'UserController@update_avatar');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::resource('boards', 'MessageBoardController', ['only' => [
    'index', 'show', 'create', 'update', 'edit', 'destroy','store',
]]);

Route::resource('properties', 'PropertyController', ['only' => [
    'index', 'show', 'create', 'update', 'edit', 'destroy','store',
]]);




