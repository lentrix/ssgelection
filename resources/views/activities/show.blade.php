@extends('base')

@section('content')

<div class="float-end">
    @include('activities.update-activity-modal', compact('activity'))
</div>

<h1 class="mt-3">View Activity</h1>
<hr>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Activity Details
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Title</th><td>{{$activity->title}}</td>
                    </tr>
                    <tr>
                        <th>Date</th><td>{{$activity->start->format('F d, Y - l')}}</td>
                    </tr>
                    <tr>
                        <th>Start Time</th><td>{{$activity->start->format('g:i A')}}</td>
                    </tr>
                    <tr>
                        <th>End Time</th><td>{{$activity->end->format('g:i A')}}</td>
                    </tr>
                </table>
                @if(auth()->user()->is_admin)
                <p>
                    <strong>Generator Link: </strong><br>
                    {{url("/activities/generator/$activity->token")}}
                </p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    My Codes
                </h3>
            </div>
            <div class="card-body">
                {!! Form::open(['url'=>'/activities/' . $activity->id . '/submit']) !!}
                <div class="input-group mb-3">
                    <input type="text" name="code" class="form-control" placeholder="Activity Code" aria-label="Activity Code" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Submit Code</button>
                </div>
                {!! Form::close() !!}
                <table class="table table-striped">
                    <tr>
                        <th>Code</th>
                        <th>Submitted On</th>
                    </tr>
                    @foreach($userCodes as $userCode)
                    <tr>
                        <td>{{$userCode->code}}</td>
                        <td>{{$userCode->created_at}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
