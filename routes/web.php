<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ViewableEventController;
use App\Http\Controllers\ViewsController;
use App\Models\ActivityCode;
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

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/forgot', [AuthController::class, 'forgotForm']);
Route::post('/forgot', [AuthController::class, 'forgot']);
Route::get('/forgot-password-change/{token}', [AuthController::class, 'passwordRecoveryForm']);
Route::post('/forgot-password-change', [AuthController::class, 'passwordRecovery']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/candidates', [CandidateController::class, 'index']);
    Route::get('/candidates/{candidate}', [CandidateController::class, 'show']);
    Route::patch('/candidates/{candidate}', [CandidateController::class, 'update']);

    Route::get('/election', [ElectionController::class, 'index']);
    Route::post('/vote/{user}', [ElectionController::class, 'vote']);
    Route::post('/confirm-vote/{user}', [ElectionController::class, 'confirmVote']);
    Route::get('/results', [ElectionController::class, 'results']);

    Route::get('/activities', [ActivityController::class, 'index']);
    Route::get('/activities/summary', [ActivityController::class, 'summary']);
    Route::get('/activities/individual-report', [ActivityController::class, 'individualReport']);
    Route::get('/activities/{activity}', [ActivityController::class, 'show']);
    Route::post('/activities/{activity}/submit', [ActivityController::class, 'submitCode']);

    Route::get('/raffles/items', [RaffleController::class, 'items']);
    Route::get('/raffles/winners', [RaffleController::class, 'winners']);

    Route::get('/viewable-events/{viewableEvent}/{tag}', [ViewableEventController::class, 'show']);

    Route::get('/videos/{video}', [VideoController::class, 'show']);
    Route::post('/views', [ViewsController::class, 'store']);

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::patch('/users/{user}', [UserController::class, 'update']);
        Route::get('/users/edit/{user}', [UserController::class, 'edit']);
        Route::post('/users', [UserController::class, 'store']);
        Route::post('/users/search', [UserController::class, 'search']);
        Route::get('/users/{user}', [UserController::class, 'show']);

        Route::get('/raffles/draw', [RaffleController::class, 'draw']);
        Route::post('/raffles/winners', [RaffleController::class, 'storeWinner']);
        Route::post('/raffles/items', [RaffleController::class, 'store']);
        Route::put('/raffles/items', [RaffleController::class, 'updateItem']);

        Route::post('/activities', [ActivityController::class, 'store']);
        Route::put('/activities/{activity}', [ActivityController::class, 'update']);
        Route::get('/activities/generator/{token}', [ActivityController::class, 'codeGenerator']);
        Route::post('/activities/add-checkpoint/{activity}', [ActivityController::class, 'addCheckpoint']);
        Route::get('/code-view', function () {
            return view('code-view');
        });

        Route::get('/viewable-events', [ViewableEventController::class, 'index']);
        Route::post('/viewable-events', [ViewableEventController::class, 'store']);

        Route::post('/videos/{viewableEvent}', [VideoController::class, 'store']);

        Route::get('/individual-views', [ViewsController::class, 'individualViews']);
    });
});
