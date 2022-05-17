<?php

use App\Http\Controllers\ActivityController;
use App\Models\Activity;
use App\Models\ActivityCode;
use App\Models\User;
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

    $checkPoint = null;

    if(!$act) {
        return response()->json(['checkPoint'=>null]);
    }


    $checkPoint = ActivityCode::where('activity_id', $act->id)
        ->where('starts','<', now())
        ->where('expires','>', now())
        ->first();

    if(!$checkPoint) {
        return response()->json(['checkPoint'=>null]);
    }


    return response()->json([
        'checkPoint' => [
            'code' => $checkPoint->code,
            'starts' => $checkPoint->starts->format('g:i A'),
            'expires' => $checkPoint->expires->format('g:i A'),
        ]
    ],200);

});


Route::get('/draw-list/{all}/{activity}', function($all=0, $activityId=0) {
    $users = User::orderBy('lname')->orderBy('fname');

    if(!$all) {
        $users->whereDoesntHave('rafflePrizes');
    }

    if($activityId) {
        $users->whereHas('userActivityCodes', function($query) use ($activityId) {
            $query->where('activity_id', $activityId);
        });
    }

    return response()->json($users->get());
});

Route::get('/search-user/{key}', function($key) {
    $users = User::where('lname','like',"%$key%")
        ->orWhere('fname','like',"%$key%")
        ->orderBy('lname')->orderBy('fname')
        ->get();
    return response()->json($users);
});
