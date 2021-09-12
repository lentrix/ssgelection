@extends('base')
@section('content')
    <h1 class='mt-3'>Raffle Winners</h1>
    <hr>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="bg-success">
                <th>Winner</th>
                <th>Program & Year</th>
                <th>Prize</th>
                <th>Sponsor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($raffleWinners as $raffleWinner)

            <tr>
                <td>{{$raffleWinner->user->lname}}, {{$raffleWinner->user->fname}}</td>
                <td>{{$raffleWinner->user->program}} - {{$raffleWinner->user->year}}</td>
                <td>{{$raffleWinner->rafflePrize->item}}</td>
                <td>{{$raffleWinner->rafflePrize->sponsor}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
