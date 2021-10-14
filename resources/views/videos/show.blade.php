@extends('base')

@section('head-scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

<h1>{{$video->title}}</h1>
<hr>
<div class="row">
    <div class="col-md-9">
        <iframe style="width: 100%" height="400"
                src="https://www.youtube.com/embed/{{$video->video_id}}/&autoplay=1"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        <hr>
        <p>{{$video->description}}</p>

        {!! Form::hidden("user_id", auth()->user()->id) !!}
        {!! Form::hidden("video_id", $video->id) !!}

    </div>
    <div class="col-md-3">
        @foreach($videos as $video)

            <a href='{{url("/videos/$video->id")}}' class="card mb-3" style="width: 100%; text-decoration:none">
                <img src="https://img.youtube.com/vi/{{$video->video_id}}/0.jpg" alt="Thumbnail" class="card-image-top">
                <div class="card-body">
                    <h5 class="card-title">{{$video->title}}</h5>
                </div>
            </a>

        @endforeach
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        setTimeout(() => {
            let userId = $("input[name=user_id]").val()
            let videoId = $("input[name=video_id]").val()
            let _token = $('meta[name="csrf-token"]').attr('content')

            $.ajax({
                url: "/views",
                type: "POST",
                data: {
                    user_id:userId,
                    video_id:videoId,
                    _token:_token
                },
                success: function(response) {
                    console.log(response)
                }
            })
        }, 60000);
    })
</script>

@endsection
