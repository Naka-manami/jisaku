@extends('layouts.app')

@section('content')
<main>
<h1>商品詳細</h1>
  <div class ="itemdetail">
  <img src="{{ asset('img/' . $item->id . '/' . $item->image) }}">
  <p>{{$item['item_name']}}</p>
    <p>{{$item['price']}}</p>

    @if($like_model->like_exist(Auth::user()->id,$item->id))
      <p class="favorite-marke">
        <a class="js-like-toggle loved" href="" data-itemid="{{ $item->id }}"><i class="fas fa-heart"></i></a>
        <span class="likesCount">{{$item->likes_count}}</span>
      </p>
      @else
      <p class="favorite-marke">
        <a class="js-like-toggle" href="" data-itemid="{{ $item->id }}"><i class="fas fa-heart"></i></a>
        <span class="likesCount">{{$item->likes_count}}</span>
      </p>
    @endif​
  </div>
  <div>
    @if(!empty($reviews))
    @foreach($reviews as $review)
    <p>レビュー</p>
    <p>{{ $review['title'] }}</p>
    <p>{{ $review['content'] }}</p>
    @endforeach
    <p>レビューはまだありません</p>
    @endif
  </div>

    <a href="{{route('cart',['id'=>$item['id']]) }}">カートへ</a>
</main>
@endsection
