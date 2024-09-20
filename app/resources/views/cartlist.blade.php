@extends('layouts.app')

@section('content')
@php
$totals = 0;
@endphp
<div class="container">
<b>カート</b>

  <div class="itemcandi">
  @foreach($carts as $cart)
  <form action="{{ route('itembuy.conf',['id'=>$cart['id']])}}" method="get">
  @csrf
  <img src="{{ asset('img/' . $cart['item']->id . '/' . $cart['item']->image) }}">
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

    <input type="submit" value="次へ">
    </form>
  @endforeach
  </div>
  <b>合計額</b>
  <p>{{$totals}} 円</p>

 
</div>
@endsection
