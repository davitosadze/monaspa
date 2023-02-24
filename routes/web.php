<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Teams
    Route::resource('teams', TeamController::class);

    // Players
    Route::get('/teams/players/{team}', [PlayerController::class, 'index'])->name('team.players');
    Route::get('/teams/players/create/{team}', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/teams/players/store/{team]', [PlayerController::class, 'store'])->name('players.store');

    Route::get('/teams/players/show/{player}', [PlayerController::class, 'show'])->name('players.show');
    Route::put('/teams/players/{player}', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/teams/players/{player}', [PlayerController::class, 'destroy'])->name('players.delete');

    // Games
    Route::resource('games', GameController::class);

    // News
    Route::resource('news', BlogController::class);
});
