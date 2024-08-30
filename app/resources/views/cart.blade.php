@extends('layouts.app')

@section('content')
<div class="container">
<b>カート</b>
<form action="{{ route('buy')}}" method="post">
@csrf
@foreach($items as $item)
  <div class="itemcandi">
    <input type="checkbox" checked="checked" name="checkbox" value="0">
    <a href="遷移させたいURL"> 
      <img src="images/pic1.jpeg" id="pic">
    </a>
    <h>{{$item['item_name']}}</h>
    <p>{{$item['price']}}</p>
    <input type="number" name="count" id="count" >
</div>
@endforeach
  <p>合計</p>
  <b>合計額</b>
  <input type="submit" value="次へ">
</form>
</div>
@endsection
