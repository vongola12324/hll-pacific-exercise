<?php

use App\Http\Controllers\BattleController;
use App\Http\Controllers\ForceController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\UserController;
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

require __DIR__ . '/auth.php';

Route::get('/', [FrontpageController::class, 'welcome'])->name('index');
Route::get('/next', [FrontpageController::class, 'next'])->name('next');
Route::get('/history', [FrontpageController::class, 'history'])->name('history');

Route::prefix('manage')->middleware(['auth'])->as('manage.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('manage.battle.index');
    })->name('dashboard');
    Route::prefix('battle/{battle}')->group(function () {
        Route::prefix('force/{force}')->group(function () {
            Route::prefix('division/{division}')->group(function () {
                Route::resource('squad', SquadController::class)->only(['index', 'show', 'destroy']);
            });
            Route::resource('division', ForceController::class);
        });
        Route::resource('force', ForceController::class);
    });
    Route::resource('battle', BattleController::class);
    Route::resource('map', MapController::class)->except(['show']);
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('password', [ProfileController::class, 'changePasswordView'])->name('password');
        Route::post('password', [ProfileController::class, 'doPasswordChange'])->name('password');
    });
    Route::resource('user', UserController::class);
});
