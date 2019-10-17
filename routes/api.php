<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(static function () {
    Route::get('users', ['as' => 'api.users', 'uses' => 'API\UserController@users']);
    Route::get('user', ['as' => 'api.users', 'uses' => 'API\UserController@currentUser']);
    Route::get('users/{user}', ['as' => 'api.users.user', 'uses' => 'API\UserController@user']);
    Route::get('users/{user}/friends', ['as' => 'api.users.friends', 'uses' => 'API\UserController@friends']);
    Route::post('users/{user}/friends/add', ['as' => 'api.users.friends.add', 'uses' => 'API\UserController@addFriend']);
});
