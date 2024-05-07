<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\API\AuthController;
use App\Models\Client;

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

Route::resource('clients', ClientController::class)->middleware('auth:api');

Route::get('/clients/search/{name}', [ClientController::class, 'search'])->middleware('auth:api');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:api']);

Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('users', [RegisteredUserController::class, 'index'])->middleware(['auth:api'])->name('users');

Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact-us.store')->middleware('auth:api');

Route::get('contact-us-all', [ContactUsController::class, 'index'])->name('contact-us.index')->middleware('auth:api');