<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
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


Route::group(
    ['middleware' => 'guest'],
    function () {
        // register
        Route::get('/register', [AuthController::class, 'getRegisterForm']);
        Route::post('/register', [AuthController::class, 'register']);

        //login
        Route::get('/login', [AuthController::class, 'getLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
    }
);

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/', [TeamController::class, 'index']);
        Route::get('/teams/{id}', [TeamController::class, 'show']);
        Route::get('/players/{id}', [PlayerController::class, 'show']);

        //logout
        Route::post('/logout', [AuthController::class, 'logout']);
    }
);
