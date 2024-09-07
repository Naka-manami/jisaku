@extends('layouts.app')

@section('content')
<div class="container">
<b>カート</b>
<form action="{{ route('cart',['id'=>$item['id']])}}" method="post">
@csrf
  <div class="itemcandi">
      <img src="images/pic1.jpeg" id="pic">
    <p>{{$item['item_name']}}</p>
    <p>{{$item['price']}}</p>
    <input type="number" name="count" id="count" >
</div>
  <p>合計</p>
  <b>合計額</b>
  <input type="submit" value="次へ">
</form>
</div>
@endsection
