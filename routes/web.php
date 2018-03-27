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


Route::get('invite/{id}', 'ContractController@createInvite')->name('invite');
Route::put('sendInvitation/{id}', 'ContractController@sendInviteMail')->name('sendInvitation');



Route::post('properties/sendConnect', 'ContractController@sendConnectP')->name('connect.connect');

Route::get('showLinks/{id}', 'NotificationController@showLinks')->name('LinkedUsers');

Route::get('showMessages/{id}', 'NotificationController@messages')->name('Messages');

Route::get('showMessages2/{id}', 'NotificationController@messages2')->name('Messages2');

Route::get('createMessages/{id}', 'NotificationController@createMessages')->name('createMessages');

Route::post('sendMessages/{id}', 'NotificationController@sendMessages')->name('sendMessages');

Route::get('editMessages/{id}', 'NotificationController@editMessages')->name('editMessages');

Route::put('updateMessages/{id}', 'NotificationController@updateMessages')->name('updateMessages');

Route::delete('deleteMessages/{id}', 'NotificationController@deleteMessages')->name('deleteMessages');

Route::post('disconnectProperty/{id}', 'ContractController@disconnectP')->name('disconnect.P');





