<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View;
use App\Models\ViewableEvent;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function store(Request $request) {
        //record a view if not existing yet
        $view = View::where('user_id', $request->user_id)
                ->where('video_id', $request->video_id)->first();

        if(!$view) {
            View::create([
                'user_id' => $request->user_id,
                'video_id' => $request->video_id
            ]);
        }

        return response()->json([
            'message'=>'Success'
        ]);
    }

    public function individualViews(Request $request) {

        $viewableEvent = ViewableEvent::findOrFail($request->viewable_event_id);
        $user = User::where('idnum', $request->idnum)->first();

        if(!$user) {
            return back()->with('Error',"The ID Number $request->idnum cannot be found.");
        }

        $views = View::whereHas('user', function($query) use ($request) {
            $query->where('idnum', $request->idnum);
        })->whereHas('video', function($query2) use ($request) {
            $query2->where('viewable_event_id', $request->viewable_event_id);
        })->with('video')->get();

        return view('videos.individual-views',[
            'views' => $views,
            'viewableEvent'=>$viewableEvent,
            'user'=>$user
        ]);
    }
}
