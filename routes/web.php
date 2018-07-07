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

use App\Models\Team as Team;



Route::get('/', 'TeamController@index')->name('home');

Auth::routes();
Route::get('/home', 'TeamController@index')->name('home');
Route::resource('teams', 'TeamController');
Route::delete('teams/{id}', [
    'uses' => 'TeamController@destroy',
    'as' => 'Teams.Delete'
]);
Route::delete('players/{id}', [
    'uses' => 'PlayerController@destroy',
    'as' => 'Players.Delete'
]);
Route::get('/teams/{id}/players', 'PlayerController@showTeamPlayers');
Route::resource('players', 'PlayerController');
