<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('users', [RegisteredUserController::class, 'index']); //->middleware(['auth', 'verified'])->name('add_client');

Route::get('clients', [ClientController::class, 'index'])->middleware(['auth', 'verified'])->name('add_client');

Route::post('add_client', [ClientController::class, 'store'])->middleware(['auth', 'verified'])->name('add_client');
