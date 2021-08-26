@extends('base')

@section('content')

@if(auth()->user()->is_admin)
<div class="float-end">
    @include('activities.create-activity-modal')
</div>
@endif

<h1 class="mt-3">
    Activities
</h1>
<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Schedule</th>
            <th>Title</th>
            <th>...</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $act)
        <tr>
            <td>
                {{$act->start->format('F d, Y (l)')}}
                {{$act->start->format('g:i A')}} -
                {{$act->end->format('g:i A')}}
            </td>
            <td>
                <span style="font-weight:bold;font-size: 1.1em">{{$act->title}}</span>
            </td>
            <td>
                <div>
                    <a href="{{url('/activities/' . $act->id)}}" class="btn btn-sm btn-success">
                        <i class="fa fa-door-open" title="Open activity"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
