@extends('base')

@section('content')

@include('users.create-user-modal')

<div class="row mt-3">
    <div class="col-md-4">
        <h1>
            <button class="btn btn-sm btn-primary"
                title="Create new user."
                data-bs-toggle="modal" data-bs-target="#createUserModal">
            <i class="fa fa-plus"></i>
            </button>
            Search Users
        </h1>
    </div>
    <div class="col-md-4 mt-2">
        {!! Form::open(['url'=>'/users/search', 'method'=>'post']) !!}
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Last Name" name="key">
            <button class="btn btn-secondary" type="submit" id="button-addon2">Search</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<hr>

@if($users)

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Number</th>
            <th>Name</th>
            <th>Program</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)

        <tr>
            <td><a href="{{url('/users/edit/' . $user->id)}}" class="nav-link">{{$user->idnum}}</a></td>
            <td>{{$user->fullName}}</td>
            <td>{{$user->program}}</td>
            <td>{{$user->year}}</td>
        </tr>

        @endforeach
    </tbody>
</table>

@endif

@endsection
