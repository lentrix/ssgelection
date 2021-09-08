@extends('base')

@section('content')
    <h1>Already Voted!</h1>
    <div class="alert alert-info">
        Thank you very much for your valuable participation. <br>
        <strong>The election results will be published after
        {{date('F d, Y g:i A', strtotime(config('app.election_end')))}}</strong> <br>
        Click on Election -> Results to view the results of the election.
    </div>
@endsection
