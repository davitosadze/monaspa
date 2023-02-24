<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('blog', [BlogController::class, "index"]);
Route::get('blog/{blog}', [BlogController::class, "details"]);

Route::get('teams', [TeamController::class, "index"]);
Route::get('games/{filter}', [GameController::class, "index"]);
Route::get('games/{game}/details', [GameController::class, "details"]);
