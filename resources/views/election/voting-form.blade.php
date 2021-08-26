@extends('base')

@section('content')

<h1 class='mt-3'>Voting Form</h1>
<hr>

<div class="alert alert-info">
    *Cast your vote with all honesty and integrity.
</div>
{!! Form::open(['url'=>'/election', 'method'=>'post', 'id'=>'voting-form']) !!}

<div class="row">
    <div class="col-md-6">

        <div class="mb-3 card card-body">
            {!! Form::label("president", "President",['style'=>'font-weight: bold; font-size: 1.2em']) !!}
            {!! Form::select("president", $pres, null, ['class'=>'form-control','placeholder'=>'Select your president']) !!}
        </div>
        <div class="mb-3 card card-body">
            {!! Form::label("vice_president", "Vice President",['style'=>'font-weight: bold; font-size: 1.2em']) !!}
            {!! Form::select("vice_president", $vpres, null, ['class'=>'form-control','placeholder'=>'Select your president']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3 card card-body">
            {!! Form::label("", "Senator (Maximum of 6)",['style'=>'font-weight: bold; font-size: 1.2em']) !!}
            @foreach($sens as $senId=>$sn)
                <div class="form-check">
                    <input type="checkbox" name="senator[]" value="{{$senId}}" id="sen_{{$senId}}" class="form-check-input">
                    <label for="sen_{{$senId}}" class="form-check-label">{{$sn}}</label>
                </div>
            @endforeach
        </div>
    </div>

    <button class="btn btn-lg btn-primary mt-3" type="button">
        <i class="fa fa-fingerprint"></i> Drop Your Votes!
    </button>
    {!! Form::close() !!}
</div>

@endsection
