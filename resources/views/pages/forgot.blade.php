@extends('base')

@section('content')

<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Password Recovery
                    <i class="fa fa-lock float-end"></i>
                </h3>
            </div>
            <div class="card-body">
                {!! Form::open(['url'=>'/forgot', 'method'=>'post']) !!}
                <div class="mb-3">
                    {!! Form::label('email', "Enter your Email Address") !!}
                    {!! Form::email('email', null, ['class'=>'form-control text-primary']) !!}
                </div>
                <button class="btn btn-primary w-50">
                    <i class="fa fa-upload"></i> Submit
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
