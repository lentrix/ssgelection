@extends('base')

@section('content')

<h1>Election Result</h1>

<div class="row">
    <div class="col-md-6">
        @foreach($result as $label=>$block)
            <h4>{{$label}}</h4>
            <ul class="list-group">
            <?php $max = 0; ?>
            @foreach($block as $index=>$item)
                <li class="list-group-item">
                    @if( ($index==0 || ($label=="Senator" && $index<6)) && $item['count']>0)
                        <i class="fa fa-check"></i>
                    @else
                        <span style="width: 15px; display: inline-block">&nbsp;</span>
                    @endif
                    {{$item['candidate']}} <span class="float-end badge bg-primary">{{$item['count']}}</span>
                </li>
            @endforeach
            </ul>
        @endforeach
    </div>
</div>

@endsection
