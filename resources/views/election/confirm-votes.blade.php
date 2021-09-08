@extends('base')

@section('content')
    <h1>Vote Confirmation</h1>


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Voter: {{auth()->user()->fullName}}
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <h4 class="card-title">President</h4>
                            <div>{{$pr->user->fullName}}</div>
                        </div>
                        <div class="list-group-item">
                            <h4 class="card-title">Vice-President</h4>
                            <div>{{$vp->user->fullName}}</div>
                        </div>
                        <div class="list-group-item">
                            <h4 class="card-title">Senator</h4>
                            <ul>
                                @foreach($sn as $sen)
                                    <li>{{$sen->user->fullName}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="list-group-item">
                            <h4 class="card-title">Representative</h4>
                            <div>{{$rp->user->fullName}}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href="{{url('/election')}}" class="btn btn-danger w-100">
                                    Back
                                </a>
                            </div>
                            <div class="col">
                                <form action="{{url('/confirm-vote/' . auth()->user()->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="president" value="{{$pr->id}}">
                                    <input type="hidden" name="vice-president" value="{{$vp->id}}">
                                    @foreach($sn as $sen)
                                        <input type="hidden" name="senator[]" value="{{$sen->id}}">
                                    @endforeach
                                    <input type="hidden" name="representative" value="{{$rp->id}}">
                                    <button class="btn btn-primary w-100" type="submit">
                                        Confirm Votes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
