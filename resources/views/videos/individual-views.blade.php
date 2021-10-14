@extends('base')

@section('content')

<h1 class="mt-3">Individual Views</h1>
<hr>
<div class="row">
    <div class="col-md-4">
        <table class="table table-bordered table-striped">
            <tr><th>Student</th><td>{{$user->fullname}}</td></tr>
            <tr><th>Program</th><td>{{$user->program}}</td></tr>
            <tr><th>Year</th><td>{{$user->year}}</td></tr>
            <tr><th>Event</th><td>{{$viewableEvent->title}}</td></tr>
            <tr><th>Views</th><td>{{count($views)}}</td></tr>
        </table>
        <hr>
        <h4>Check Individual Views</h4>
        {!! Form::open(['url'=>'/individual-views','method'=>'get']) !!}
        <div class="input-group mb-3">
            {!! Form::hidden("viewable_event_id", $viewableEvent->id) !!}
            {!! Form::label("idnum", "IDNum", ['class'=>'input-group-text']) !!}
            {!! Form::text("idnum", null, ['class'=>'form-control']) !!}
            <button class="btn btn-primary" type="submit">Go</button>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-8 d-flex flex-wrap justify-content-around">
        @foreach($views as $view)

            <a href='{{url("/videos/{$view->video->id}")}}' class="card mb-3" style="width: 170px; text-decoration:none">
                <img src="https://img.youtube.com/vi/{{$view->video->video_id}}/0.jpg" alt="Thumbnail" class="card-image-top">
                <div class="card-body">
                    <h6 class="card-title">{{$view->video->title}}</h6>
                </div>
            </a>

            @endforeach
    </div>
</div>

@endsection
