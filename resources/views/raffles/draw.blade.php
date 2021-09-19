@extends('base')
@section('content')
    <h1 class='mt-3'>Raffle Draw</h1>
    <hr>
    <div class="row">
        <div class="col-md-4">
            {!! Form::open(['url'=>'/raffles/winners', 'method'=>'post', 'id'=>'draw-form']) !!}

            <div class="mb-3">
                {!! Form::label('item', 'Select Raffle Item') !!}
                {!! Form::select('item', $raffleItems, null, ['class'=>'form-control','placeholder'=>'Select Raffle Item']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label('activity', 'Filter Activity Attendance') !!}
                {!! Form::select('activity', $activities, null, ['class'=>'form-control','placeholder'=>'Select Activity','id'=>'form-activity']) !!}
            </div>
            {!! Form::hidden('user_id',null, ['id'=>'user_id']) !!}
            <div class="mb-3">
                <input type="checkbox" id="include-all" unchecked="true">
                <label for="include-all">Include Previous Winners</label>
            </div>
            <button class="btn btn-primary draw-button" type="button">
                Draw Now!
            </button>

            {!! Form::close() !!}
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Congratulations</h3>
                </div>
                <div class="card-body">
                    <h1 id="winner" class="mb-0"></h1>
                    <h6 id="program-year"></h6>
                    <button class="btn btn-warning draw-button" id="redraw">Redraw</button>
                    <button class="btn btn-success" id="accept">Accept Winner</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>

    $(document).ready(function(){

        $(".draw-button").click(function(){
            var userList = null
            var url = '/api/draw-list'
            var all = 0
            var activityId = $("#form-activity").val() ? $("#form-activity").val() : 0

            if($("#include-all").prop('checked')==true) {
                all = 1
            }

            $.get(url + "/" + all + "/" + activityId, function(data, status) {
                userList = data

                var count = 40
                var rnd = setInterval(function(){
                    user = userList[Math.floor(Math.random()*userList.length)]
                    $("#winner").text(user.lname + ", " + user.fname)
                    $("#program-year").text(user.program + " - " + user.year)
                    $("#user_id").val(user.id)
                    if(--count == 0) {
                        clearInterval(rnd)
                    }
                },100)
            })

        })

        $("#accept").click(function(){
            $("#draw-form").trigger('submit')
        })
    })
</script>

@endsection
