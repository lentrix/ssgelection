@extends('base')
@section('content')

@if(auth()->user()->is_admin)
    @include('raffles.add-raffle-item-modal')
    @include('raffles.update-raffle-item-modal')
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
            <td>
                {{$rafflePrize->quantity}}
                @if(auth()->user()->is_admin)
                <button class="btn btn-sm btn-info float-end update-btn"
                        title="Update this item"
                        data-id="{{$rafflePrize->id}}"
                        data-item="{{$rafflePrize->item}}"
                        data-worth="{{$rafflePrize->worth}}"
                        data-sponsor="{{$rafflePrize->sponsor}}"
                        data-quantity="{{$rafflePrize->quantity}}"
                    >
                    <i class="fa fa-edit"
                            data-id="{{$rafflePrize->id}}"
                            data-item="{{$rafflePrize->item}}"
                            data-worth="{{$rafflePrize->worth}}"
                            data-sponsor="{{$rafflePrize->sponsor}}"
                            data-quantity="{{$rafflePrize->quantity}}"
                        ></i>
                </button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection


@section('scripts')
<script>

$(document).ready(function(){
    $(".update-btn").click(function(evt){
        $("#updateRaffleItemModal").modal('show')

        var el = $(evt.target)

        $("#form-id").val(el.data('id'))
        $("#form-item").val(el.data('item'))
        $("#form-worth").val(el.data('worth'))
        $("#form-sponsor").val(el.data('sponsor'))
        $("#form-quantity").val(el.data('quantity'))

    })
})

</script>
@endsection
