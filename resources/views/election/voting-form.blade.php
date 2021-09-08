@extends('base')

@section('content')

<h1 class='mt-3'>Voting Form</h1>
<hr>

<div class="alert alert-info">
    *Cast your vote with all honesty and integrity. Select your candidate by clicking on the picture.
</div>

<form action="{{url('/vote/' . $user->id)}}" method="post" id="votation-form">
    {{csrf_field()}}
    <input type="hidden" name="president" id="President-field">
    <input type="hidden" name="vice-president" id="Vice-President-field">
    <input type="hidden" name="senator" id="Senator-field">
    <input type="hidden" name="representative" id="Representative-field">
    <input type="hidden" name="user_id" value="{{$user->id}}">
</form>

@include('election.single-selection',['position'=>'President','candidates'=>$pres])
@include('election.single-selection',['position'=>'Vice President','candidates'=>$vpres])
@include('election.single-selection',['position'=>'Senator','candidates'=>$sens])
@include('election.single-selection',['position'=>'Representative','candidates'=>$reps])

<button class="btn btn-primary btn-lg" style="width: 300px" id="submit-button">
    Submit Your Votes
</button>
<hr>
<p id="form-value"></p>

@endsection

@section('scripts')

<script>
    $(document).ready(()=>{
        var form = $("#votation-form")

        var senVotes = [];

        $(".candidate-pic").click((ev)=>{
            let candidateId = $(ev.target).data('candidate-id')
            let position = $(ev.target).data('position')

            if(position!=="Senator") {
                $(".check-box-" + position).css('visibility','hidden')
                $("#check-" + candidateId).css('visibility','visible')
                $("#" + position + "-field").val(candidateId)
            }else {
                let check = $("#check-" + candidateId)

                if(senVotes.includes(candidateId)) {
                    check.css('visibility','hidden')
                    senVotes.splice(senVotes.indexOf(candidateId),1)
                }else {
                    if(senVotes.length >= 6) {
                        alert('You cannot select more than 6 senators')
                        return
                    }
                    senVotes.push(candidateId)
                    check.css('visibility','visible')
                }

                $("#Senator-field").val(JSON.stringify(senVotes))

            }
        })
        $("#submit-button").click(()=>{
            $("#votation-form").submit();
        })
    })
</script>

@endsection
