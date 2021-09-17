@extends('base')
@section('content')

<h1>Update User Details</h1>
<hr>

<div class="row">
    <div class="col-md-4">
        {!! Form::model($user, ['url'=>'/users/' . $user->id,'method'=>'patch']) !!}

        <div class="mb-3">
            {!! Form::label('idnum', 'ID Number') !!}
            {!! Form::text('idnum', null, ['class'=>'form-control text-primary']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('lname', 'Last Name') !!}
            {!! Form::text('lname', null, ['class'=>'form-control text-primary']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('fname', 'First Name') !!}
            {!! Form::text('fname', null, ['class'=>'form-control text-primary']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('program', 'Program') !!}
            {!! Form::text('program', null, ['class'=>'form-control text-primary']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('year', 'Year') !!}
            {!! Form::text('year', null, ['class'=>'form-control text-primary']) !!}
        </div>
        <div class="mb-3">
            {!! Form::label('dept', 'Department') !!}
            {!! Form::text('dept', null, ['class'=>'form-control text-primary']) !!}
        </div>

        <button class="btn btn-primary" type="submit">
            Update User Details
        </button>

        {!! Form::close() !!}
    </div>
</div>

@endsection
