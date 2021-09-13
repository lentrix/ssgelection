@extends('base')
@section('content')

@if(auth()->user()->is_admin)
    @include('raffles.add-raffle-item-modal')
@endif
<h1 class='mt-3'>Raffle Prizes</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Item</th>
            <th>Worth</th>
            <th>Sponsor</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rafflePrizes as $rafflePrize)
        <tr>
            <td>{{$rafflePrize->item}}</td>
            <td>₱{{number_format($rafflePrize->worth,2)}}</td>
            <td>{{$rafflePrize->sponsor}}</td>
            <td>{{$rafflePrize->quantity}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
