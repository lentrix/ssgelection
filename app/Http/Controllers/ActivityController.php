<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityCode;
use App\Models\UserActivityCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index() {
        $activities = Activity::orderBy('start')->get();
        return view('activities.index', compact('activities'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'string|required',
            'date' => 'date|required',
            'start' => 'required',
            'end' => 'required|after:start'
        ]);

        $st = $request->date . ' ' . $request->start;
        $en = $request->date . ' ' . $request->end;
        $token = Str::random(60);

        Activity::create([
            'title' => $request->title,
            'start' => $st,
            'end' => $en,
            'token' => $token
        ]);

        return redirect('/activities')->with('Info','A new activity has been created.');
    }

    public function update(Request $request, Activity $activity) {
        $now = Carbon::now();

        if($now->isAfter($activity->end)) {
            return back()->with('Error','You cannot edit an activity that has been concluded.');
        }

        $request->validate([
            'title' => 'string|required',
            'date' => 'date|required',
            'start' => 'required',
            'end' => 'required|after:start'
        ]);

        $st = $request->date . ' ' . $request->start;
        $en = $request->date . ' ' . $request->end;

        $activity->update([
            'title' => $request->title,
            'start' => $st,
            'end' => $en,
        ]);

        return back()->with('Info','The activity has been updated.');
    }

    public function show(Activity $activity) {
        $userCodes = UserActivityCode::where('activity_id', $activity->id)
                ->where('user_id', auth()->user()->id)->get();

        return view('activities.show', [
            'activity' => $activity,
            'userCodes' => $userCodes
        ]);
    }

    public function submitCode(Activity $activity, Request $request) {
        $request->validate([
            'code' => 'required|min:6|max:6'
        ]);

        $activityCode = ActivityCode::where('activity_id', $activity->id)
                ->where('code', $request->code)->first();

        if(!$activityCode) {
            return back()->with('Error','The code you entered ' . $request->code . ' is invalid.');
        }

        UserActivityCode::create([
            'user_id' => auth()->user()->id,
            'activity_id' => $activity->id,
            'code' => $request->code
        ]);

        return redirect('/activities/' . $activity->id)->with('Info','Activity code submitted.');
    }

    public function codeGenerator($token) {
        $activity = Activity::where('token', $token)->first();

        $now = Carbon::now('Asia/Manila');

        if($now->isBefore($activity->start) || $now->isAfter($activity->end)) {
            return view('activities.not-scheduled', compact('activity'));
        }

        return view('activities.code-generator', compact('activity'));
    }

    public function postCode(Request $request) {
        $activity = Activity::where('token', $request->token)->first();

        if(!$activity) {
            return response()->json([
                'message'=>'Invalid activity token.'
            ],404);
        }

        $now = Carbon::now();

        if($now->isBefore($activity->start) || $now->isAfter($activity->end)) {
            return response()->json([
                'message'=>'Activity is not scheduled at the moment.'
            ], 403);
        }

        $code = strtoupper(Str::random(6));

        return response()->json([
            'code'=>$code
        ],201);
    }
}
