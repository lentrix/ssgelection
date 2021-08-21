@extends('base')

@section('content')

<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title">
                    User Verification
                    <i class="fa fa-key float-end"></i>
                </h4>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    This facility allows you to verify your account.
                    Upon successful verification,
                    you will receive your temporary password through your email.
                    Enter the following information to verify your account. <br>
                    <span class="text-danger"><strong>*Note that all the fields are required.</strong></span>
                </div>
                {!! Form::open(['url'=>'/verification','method'=>'post']) !!}

                <div class="mb-3">
                    {!! Form::label('idnum', "ID Number (e.g. 001683)") !!}
                    {!! Form::number('idnum', null, ['class'=>'form-control text-warning']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('idext', "ID Number Extension (e.g. 1T21)") !!}
                    {!! Form::text('idext', null, ['class'=>'form-control text-warning']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('lname', "Last Name") !!}
                    {!! Form::text('lname', null, ['class'=>'form-control text-warning']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('fname', "First Name") !!}
                    {!! Form::text('fname', null, ['class'=>'form-control text-warning']) !!}
                </div>
                <div class='alert alert-warning'>
                    It is extremely important that you enter a valid email.
                    Otherwise, you will not receive your temporary password.
                </div>
                <div class="mb-3">
                    {!! Form::label('email', "Email") !!}
                    {!! Form::email('email', null, ['class'=>'form-control text-warning']) !!}
                </div>

                <button class="btn btn-primary">
                    <i class="fa fa-upload"></i> Submit Verification Information
                </button>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
