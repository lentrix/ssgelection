<div class="d-flex justify-content-start flex-wrap">

    @foreach($candidates as $c)

    <div style="width: 168px">
        <div class="card me-2 mb-2">
            <img src="{{asset('images/candidates/' . $c->user_id . '.png')}}" alt="" class="card-img-top">
            <div class="card-header p-0 text-center bg-info text-white">{{$c->position}}</div>
            <div class="card-body p-2">
                <div style="line-height: 0.95em">
                    <a href="{{url('/candidates/' . $c->id)}}">
                    <strong style="font-size: 1.2em">{{$c->user->lname}}</strong> <br>
                    {{$c->fname}} <br>
                    {{$c->user->dept}} <br>
                    </a>
                </div>
            </div>
            <div class="card-footer p-0 text-center">
                {{$c->party}}
            </div>
        </div>
    </div>

    @endforeach

</div>
