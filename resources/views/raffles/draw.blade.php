@extends('base')
@section('content')
    <h1 class='mt-3'>Raffle Draw</h1>
    <hr>
    <div class="row">
        <div class="col-md-4">
            {!! Form::open(['url'=>'/raffles/winners', 'method'=>'post']) !!}

            <div class="mb-3">
                {!! Form::label('item', 'Select Raffle Item') !!}
                {!! Form::select('item', $raffleItems, null, ['class'=>'form-control','placeholder'=>'Select Raffle Item']) !!}
            </div>
            {!! Form::hidden('user_id', null) !!}
            <div class="mb-3">
                <input type="checkbox" id="include-all" unchecked="true">
                <label for="include-all">Include Previous Winners</label>
            </div>
            <button class="btn btn-primary" type="button" id="draw">
                Draw Now!
            </button>

            {!! Form::close() !!}
        </div>
        <div class="col-md-8">

        </div>
    </div>
@endsection

