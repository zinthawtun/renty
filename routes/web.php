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
    'index', 'create', 'update', 'edit', 'destroy','store',
]]);


Route::get('/properties/{id}', 'PropertyController@oneProperty')->name('property');

Route::get('landlordReview', 'UserController@lReview')->name('landlordReview');
Route::get('tenantReview', 'UserController@tReview')->name('tenantReview');
Route::post('reviewPost', 'UserController@postReview')->name('reviews.post');
Route::get('reviews/{id}', 'UserController@showReview')->name('reviews.show');


Route::get('invite/{id}', 'NotificationController@createInvite')->name('invite');
Route::put('sendInvitation/{id}', 'NotificationController@sendInviteMail')->name('sendInvitation');
Route::put('properties/connect', 'NotificationController@connectP')->name('properties/connect');

