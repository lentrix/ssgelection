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
                ID Number: {{$user->idnum}} <br>
                Name: {{$user->lname}}, {{$user->fname}}
                <hr>
                {!! Form::open(['url'=>'/forgot-password-change','method'=>'post']) !!}
                {!! Form::hidden('id', $user->id) !!}
                <div class="mb-3">
                    {!! Form::label('password', "New Password") !!}
                    {!! Form::password('password', ['class'=>'form-control text-primary']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('password_confirmation', "Confirm New Password") !!}
                    {!! Form::password('password_confirmation', ['class'=>'form-control text-primary']) !!}
                </div>
                <button class="btn btn-primary">
                    <i class="fa fa-check"></i> Change Password
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
