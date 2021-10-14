<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\ViewableEvent;
use Illuminate\Http\Request;

class ViewableEventController extends Controller
{
    public function index() {
        $viewableEvents = ViewableEvent::orderBy('start','desc')->get();
        return view('viewable-events.index',[
            'viewableEvents' => $viewableEvents
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'string|required',
            'start_date' => 'string|required',
            'start_time' => 'string|required',
            'end_date' => 'string|required',
            'end_time' => 'string|required',
        ]);

        ViewableEvent::create([
            'title' => $request->title,
            'start' => $request->start_date . " " . $request->start_time,
            'end' => $request->end_date . " " . $request->end_time,
        ]);

        return redirect('/viewable-events')->with('Info','A new viewable event has been created.');
    }

    public function show(ViewableEvent $viewableEvent, $tag=null) {
        $videos = Video::where('viewable_event_id', $viewableEvent->id)->orderBy('created_at','desc');
        if($tag) {
            $videos->where('tags','like',"%$tag%");
        }

        $tags = Video::distinct('tags')->select('tags')->get();

        return view('viewable-events.show',[
            'viewableEvent' => $viewableEvent,
            'videos' => $videos->get(),
            'tags'=>$tags
        ]);
    }


}
