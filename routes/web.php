<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionController;
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

Route::get('/login', [AuthController::class,'loginForm']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/forgot', [AuthController::class, 'forgotForm']);
Route::post('/forgot', [AuthController::class, 'forgot']);
Route::get('/forgot-password-change/{token}', [AuthController::class, 'passwordRecoveryForm']);
Route::post('/forgot-password-change', [AuthController::class, 'passwordRecovery']);

Route::group(['middleware'=>'auth'], function() {
    Route::get('/logout',[AuthController::class, 'logout']);
    Route::get('/candidates', [CandidateController::class,'index']);
    Route::get('/candidates/{candidate}', [CandidateController::class,'show']);
    Route::patch('/candidates/{candidate}', [CandidateController::class,'update']);

    Route::get('/election', [ElectionController::class, 'votingForm']);

    Route::get('/activities', [ActivityController::class,'index']);
    Route::get('/activities/{activity}', [ActivityController::class,'show']);
    Route::post('/activities/{activity}/submit', [ActivityController::class, 'submitCode']);
    Route::group(['middleware'=>'admin'], function(){
        Route::post('/activities', [ActivityController::class,'store']);
        Route::put('/activities/{activity}', [ActivityController::class,'update']);
    });
});
