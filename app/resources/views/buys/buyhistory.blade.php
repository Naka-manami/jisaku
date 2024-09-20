@extends('layouts.app')

@section('content')
@php
$totals = 0;
@endphp
<div class="container">
<h>購入履歴</h>

  <div class="itemcandi">
  @foreach($buyhistorys as $buyhistory)
   
    <img src="{{ asset('img/' . $buyhistory['item']->id . '/' . $buyhistory['item']->image) }}">

    <p>{{$buyhistory['item']['item_name']}}</p>
    <p>単価</p>
    <p>{{$buyhistory['item']['price']}} 円</p>
    <p>数量</p>
    <p>{{$buyhistory['count']}} 個</p>
    <p>購入日</p>
    <p>{{$buyhistory['created_at']}} </p>
    <a href="{{ route('write.review',['id'=>$buyhistory['item_id']])}}">レビューを書く</a>

  @endforeach
  </div> 
</div>
@endsection
