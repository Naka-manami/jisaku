@extends('layouts.app')

@section('content')
@php
$totals = 0;
@endphp
<div class="container">
<b>カート</b>
<form action="{{ route('itembuy.conf')}}" method="post">
@csrf
  <div class="itemcandi">
  @foreach($carts as $cart)
    <img src="images/pic1.jpeg" id="pic">
    <p>{{$cart['item']['item_name']}}</p>
    <p>単価</p>
    <p>{{$cart['item']['price']}} 円</p>
    <p>数量</p>
    <p>{{$cart['count']}} 個</p>
    <p>合計</p>
    @php
    $total = $cart['item']['price'] * $cart['count'];
    $totals += $total;
    @endphp
    <p>{{$total}} 円</p>

  @endforeach
  </div>
  <b>合計額</b>
  <p>{{$totals}} 円</p>

  <input type="submit" value="次へ">
</form>
</div>
@endsection
