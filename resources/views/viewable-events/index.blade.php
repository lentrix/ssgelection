@extends('base')

@section('content')
    @if(auth()->user()->is_admin)
        <div class="float-end">
            @include('viewable-events.create-modal')
        </div>
    @endif

    <h1 class="mt-3">Viewable Events</h1>
    <hr>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="bg-info text-white">
                <th>Event Title</th>
                <th>Start</th>
                <th>End</th>
                <th class='text-center'><i class="fa fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewableEvents as $ve)
            <tr>
                <td>{{$ve->title}}</td>
                <td>{{$ve->start->format('F d, Y g:i A')}}</td>
                <td>{{$ve->end->format('F d, Y g:i A')}}</td>
                <td class='text-center'>
                    <a href='{{url("/viewable-events/$ve->id/0")}}' class="btn btn-sm btn-dark">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
