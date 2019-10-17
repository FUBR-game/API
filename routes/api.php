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

Route::middleware('auth:api')->namespace('API')->group(static function () {
    Route::get('user', ['as' => 'api.users', 'uses' => 'UserController@currentuser']);
    Route::get('users', ['as' => 'api.users', 'uses' => 'UserController@users']);
    Route::get('users/{user}', ['as' => 'api.users.user', 'uses' => 'UserController@user']);
    Route::get('users/{user}/friends', ['as' => 'api.users.friends', 'uses' => 'UserController@friends']);
    Route::get('users/{user}/games', ['as' => 'api.users.games', 'uses' => 'UserController@games']);
    Route::post('users/{user}/friends/add', ['as' => 'api.users.friends.add', 'uses' => 'UserController@addFriend']);

    Route::get('games', ['as' => 'api.games', 'uses' => 'GameController@index']);
    Route::get('games/{game}', ['as' => 'api.games.game', 'uses' => 'GameController@show']);
    Route::get('games/{game}/logs', ['as' => 'api.games.game.log', 'uses' => 'GameController@logs']);
});
