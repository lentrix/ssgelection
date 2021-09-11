@extends('base')

@section('content')
<h1>Pending Results</h1>
<p class="alert alert-info">
    The Election has not yet concluded. Please check back here after
    <strong>{{date('F d, Y g:i A', strtotime(config('app.election_end')))}} </strong>
    when the election will be closed.
</p>

@endsection
