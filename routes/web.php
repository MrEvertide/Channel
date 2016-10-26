<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/settings', ['uses' => 'UserController@settings', 'as' => 'user.settings']);
Route::post('/settings', ['uses' => 'UserController@update_avatar', 'as' => 'user.updateAvatar']);
Route::get('/profile', ['uses' => 'UserController@myProfile', 'as' => 'user.myProfile']);
Route::get('/user/{id}', ['uses' => 'UserController@userProfile', 'as' => 'user.userProfile']);

Route::get('/friends',["uses"=> "FriendController@index", "as"=> "friends.index"] );
Route::get('/friends/delete/{id}', ['uses' => "FriendController@deleteFriend", "as" => "friend.remove"]);
Route::post('/friends/add', ['uses' => 'FriendController@addFriendPost', 'as' => 'friend.add']);
