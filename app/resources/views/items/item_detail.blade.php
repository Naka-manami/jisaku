@extends('layouts.app')

@section('content')
<main>
<h1>商品詳細</h1>
  <div class ="itemdetail">
    <img src="images/pic1.jpeg" id="pic">
    <p>{{$item['item_name']}}</p>
    <p>{{$item['price']}}</p>
    <p>♡</p>
  </div>
  <div>
    <p>レビュー</p>
    <p>{{ $review['title'] }}</p>
    <p>{{ $review['content'] }}</p>
  </div>

    <a href="{{route('cart',['id'=>$item['id']]) }}">カートへ</a>
</main>
@endsection
