@extends('base')

@section('content')

<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Verification Final Step
                </h3>
            </div>
            <div class="card-body">
                <div class="alert alert-success">
                    <table class="table table-bordered table-sm bg-light text-dark">
                        <tr><th>ID Number</th><td>{{$user->idnum}}</td></tr>
                        <tr><th>Name</th><td>{{$user->lname}}, {{$user->fname}}</td></tr>
                        <tr><th>Program & Year</th><td>{{$user->program}} - {{$user->year}}</td></tr>
                    </table>
                    Update your password.
                </div>

                {!! Form::open(['url'=>'verification-final','method'=>'post']) !!}
                {!! Form::hidden('id', $user->id) !!}
                <div class="mb-3">
                    {!! Form::label('password', 'New Password') !!}
                    {!! Form::password('password', ['class'=>'form-control text-primary']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('password_confirmation', 'Confirm New Password') !!}
                    {!! Form::password('password_confirmation', ['class'=>'form-control text-primary']) !!}
                </div>
                <button class="btn btn-primary">
                    <i class="fa fa-check"></i> Submit
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
