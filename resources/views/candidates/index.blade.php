@extends('base')

@section('content')

<h1 class="mt-3">List of Candidates</h1>

<div class="row">
    <div class="col">
        <h3>President</h3>
        @include('candidates.candidates-table', ['candidates'=>$pres])

        <br>

        <h3>Vice President</h3>
        @include('candidates.candidates-table', ['candidates'=>$vps])

        <br>

        <h3>Senator</h3>
        @include('candidates.candidates-table', ['candidates'=>$sens])

        <br>

        <h3>Representative</h3>
        @include('candidates.candidates-table', ['candidates'=>$reps])

        <br>
    </div>
</div>

@endsection
