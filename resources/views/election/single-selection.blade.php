<h2>{{$position}}</h2>

<div class="d-flex justify-content-start flex-wrap">

    @foreach($candidates as $c)

    <div style="width: 168px; position:relative" class="candidate-card">
        <div class="card me-2 mb-2">
            <img src="{{asset('images/check-box.png')}}"
                style="position: absolute; bottom:115px; right:5px; visibility: hidden"
                alt="" class="check-box-{{$c->position}}" id="check-{{$c->user_id}}">
            <img src="{{asset('images/candidates/' . $c->user_id . '.png')}}"
                alt="" style="cursor: pointer;" class="card-img-top candidate-pic"
                data-candidate-id="{{$c->user_id}}" data-position="{{$c->position}}">
            <div class="card-header p-0 text-center bg-info text-white">{{$c->position}}</div>
            <div class="card-body p-2">
                <div style="line-height: 0.95em">
                    <strong style="font-size: 1.2em">{{$c->user->lname}}</strong> <br>
                    {{$c->fname}} <br>
                    {{$c->user->dept}} <br>
                </div>
            </div>
            <div class="card-footer p-0 text-center">
                {{$c->party}}
            </div>
        </div>
    </div>

    @endforeach

</div>
