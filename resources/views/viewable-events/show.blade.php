@extends('base')

@section('content')
    @if(auth()->user()->is_admin)
    <div class="float-end">
            @include('viewable-events.add-video-modal')
        </div>
    @endif
    <h1 class="mt-3">{{$viewableEvent->title}}</h1>
    <hr>
    <div class="row">
        <div class="col-md-9 d-flex flex-wrap justify-content-around">

            @foreach($videos as $video)

            <a href='{{url("/videos/$video->id")}}' class="card border-dark mb-3 d-relative" style="width: 270px; text-decoration:none">
                <span class="badge bg-success text-white position-absolute ms-1 mt-1 rounded-pil"><i class="fa fa-eye"></i> {{$video->viewCount}}</span>
                <img src="https://img.youtube.com/vi/{{$video->video_id}}/0.jpg" alt="Thumbnail" class="card-image-top">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 1.2em; color: #333">{{$video->title}}</h5>
                </div>
            </a>

            @endforeach

        </div>
        <div class="col-md-3">
            @if(auth()->user()->is_admin)

            <h4>Check Individual Views</h4>
            {!! Form::open(['url'=>'/individual-views','method'=>'get']) !!}
            <div class="input-group mb-3">
                {!! Form::hidden("viewable_event_id", $viewableEvent->id) !!}
                {!! Form::label("idnum", "IDNum", ['class'=>'input-group-text']) !!}
                {!! Form::text("idnum", null, ['class'=>'form-control']) !!}
                <button class="btn btn-primary" type="submit">Go</button>
            </div>
            {!! Form::close() !!}

            @endif

            <h4>Filter Tags</h4>
            @foreach($tags as $tag)
                <a href='{{url("/viewable-events/$viewableEvent->id/$tag->tags")}}'
                        style="font-size: 1.0em; text-decoration: none"
                        class="badge bg-info text-light mb-1">{{$tag->tags}}</a>
            @endforeach
        </div>
    </div>

@endsection
