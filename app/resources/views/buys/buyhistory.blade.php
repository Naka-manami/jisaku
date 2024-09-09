@extends('layouts.app')

@section('content')
@php
$totals = 0;
@endphp
<div class="container">
<h>購入履歴</h>

  <div class="itemcandi">
  @foreach($buyhistorys as $buyhistory)
   
    <img src="images/pic1.jpeg" id="pic">

    <p>{{$buyhistory['item']['item_name']}}</p>
    <p>単価</p>
    <p>{{$buyhistory['item']['price']}} 円</p>
    <p>数量</p>
    <p>{{$buyhistory['count']}} 個</p>
    <p>購入日</p>
    <p>{{$buyhistory['created_at']}} </p>
  
  @endforeach
  </div> 
</div>
@endsection
