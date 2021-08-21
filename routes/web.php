<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/verification', [AuthController::class, 'verificationForm']);
Route::post('/verification', [AuthController::class, 'verify']);
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail']);
Route::post('/verification-final', [AuthController::class, 'verificationFinal']);
Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/login', [AuthController::class,'loginForm']);
Route::post('/login', [AuthController::class,'login']);
