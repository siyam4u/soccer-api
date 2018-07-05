<?php

use Illuminate\Http\Request;
use App\Models\Team as Team;
use App\Repositories\Team\TeamRepository;



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

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('v1')->group(function () {
        Route::get('/teams/', function (TeamRepository $teamRepository) {
            return (response()->json($teamRepository->getAll()));
        });


        Route::get('/teams/{id}/players', function ($id, TeamRepository $teamRepository) {
            return (response()->json($teamRepository->getPlayersByTeam($id)));
        });
});
