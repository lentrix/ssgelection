@extends('base')

@section('content')

<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    User Login
                    <i class="fa fa-lock float-end"></i>
                </h3>
            </div>
            <div class="card-body">
                {!! Form::open(['url'=>'/login', 'method'=>'post']) !!}
                <div class="mb-3">
                    {!! Form::label('idnum', "Student ID (e.g. 1683-1T96)") !!}
                    {!! Form::text('idnum', null, ['class'=>'form-control text-primary']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('password', "Password") !!}
                    {!! Form::password('password', ['class'=>'form-control text-primary']) !!}
                </div>
                <button class="btn btn-primary w-50">
                    <i class="fa fa-sign-in-alt"></i> Login
                </button>
                {!! Form::close() !!}
            </div>
            <div class="card-footer">
                Forgot your password? <a href="{{url('/forgot')}}">Click Here</a>
            </div>
        </div>
    </div>
</div>

@endsection
