@extends('base')

@section('content')

<a href="{{url('/activities/individual-report')}}" class="btn btn-primary float-end">
    <i class="fa fa-arrow-left"></i> Back
</a>

<h1 class="mt-3">Individual Report</h1>
<hr>

<div class="three-grid">
    @foreach($activities as $activity)

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>{{$activity->title}}</strong> <br>
            {{$activity->start->format('F d, Y')}}
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Scope</th>
                        <th>Checked</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activity->activityCodes as $code)
                        <tr>
                            <td>{{$code->code}}</td>
                            <td>{{$code->starts->format('g:i A')}}-{{$code->expires->format('g:i A')}}</td>
                            <td>
                                @if($userActivityCode=$code->check($user))
                                    <span @if(!$userActivityCode->accepted) class="striked" @endif>{{$userActivityCode->created_at->format('g:i A')}}</span>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endforeach
</div>

@endsection
