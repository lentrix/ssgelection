@extends('base')
@section('content')

@include('candidates.update-tagline-modal')
@include('candidates.update-bio-modal')

<h1 class="mt-3">Candidate Profile</h1>
<hr>

<div class="row">
    <div class="col-md-4">
        <img src="{{asset('images/unknown.png')}}" alt="Profile Image" class="w-100">
    </div>
    <div class="col-md-8">
        <table class="table table-striped">
            <tr><th>Name</th><td>{{$candidate->user->fullName}}</td></tr>
            <tr><th>Program & Year</th><td>{{$candidate->user->program}} - {{$candidate->user->year}}</td></tr>
            <tr><th>Position</th><td>{{$candidate->position}}</td></tr>
            <tr><th>Party</th><td>{{$candidate->party}}</td></tr>
            <tr>
                <th>Tag Line</th>
                <td>
                    @if($candidate->user->id===auth()->user()->id)
                    <button class="bnt btn-sm btn-secondary float-end"
                            title="Update your tag line."
                            data-bs-toggle="modal" data-bs-target="#updateTaglineModal">
                        <i class="fa fa-edit"></i>
                    </button>
                    @endif
                    {{$candidate->tag_line}}
                </td>
            </tr>
            <tr><th>Short Bio</th><td>&nbsp;</td></tr>
            <tr><td colspan="2">
                @if($candidate->user->id===auth()->user()->id)
                <button class="bnt btn-sm btn-secondary float-end"
                        title="Update your short Bio."
                        data-bs-toggle="modal" data-bs-target="#updateShortBioModal">
                    <i class="fa fa-edit"></i>
                </button>
                @endif
                {{$candidate->short_bio}}
            </td></tr>
        </table>
    </div>
</div>

@endsection
