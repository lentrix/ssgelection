<?php

use App\Http\Controllers\ActivityController;
use App\Models\Activity;
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

Route::get('/current', function() {
    $act = Activity::where('start','<',now())
        ->where('end','>',now())->first();
    if($act) {
        return response()->json([
            'activity'=>$act
        ],200);
    }else {
        return response()->json([
            'message' => 'No active activity'
        ],404);
    }
});

Route::post('/activities/code', [ActivityController::class, 'postCode']);
