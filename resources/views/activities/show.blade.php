@extends('base')

@section('content')

@include('activities.update-activity-modal', compact('activity'))

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
                <button type="button" class="btn btn-primary d-block w-100 mt-1" data-bs-toggle="modal" data-bs-target="#updateActivityModal">
                    Update Activity
                </button>

                <a href="{{url('/activities/attendances/' . $activity->id)}}" class="btn btn-info d-block mt-1">
                    View Attendances
                </a>
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
                        <td @if(!$userCode->accepted) style="text-decoration: line-through" @endif>{{$userCode->code}}</td>
                        <td @if(!$userCode->accepted) style="text-decoration: line-through" @endif>{{$userCode->created_at->format('M d, Y g:i A')}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="float-end">
                    @include('activities.add-code-modal', compact('activity'))
                </div>
                <h3 class="card-title">Checkpoints</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Starts</th>
                            <th>Expires</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activity->activityCodes as $actCode)
                        <tr>
                            <td>{{$actCode->code}}</td>
                            <td>{{$actCode->starts->format('g:i a')}}</td>
                            <td>{{$actCode->expires->format('g:i a')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
