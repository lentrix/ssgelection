<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\View;
use App\Models\ViewableEvent;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request, ViewableEvent $viewableEvent) {
        $request->validate([
            'title' => 'string|required',
            'video_id' => 'string|required',
            'description' => 'string|required',
            'tags' => 'string|required',
        ]);

        $video = Video::create($request->all());

        return redirect("/viewable-events/$viewableEvent->id/$request->tags")->with('Info','A new video has been added.');
    }

    public function show(Video $video) {
        $videos = Video::where('tags', $video->tags)
            ->where('id','<>',$video->id)
            ->limit(5)->get();

        $userId = auth()->user()->id;

        return view('videos.show', [
            'video'=>$video,
            'videos'=>$videos
        ]);
    }
}
