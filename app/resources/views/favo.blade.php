@extends('layouts.app')

@section('content')
<div class="container">
<h>お気に入り一覧</h>
<div class="itemcandi">
  @foreach($likes as $like)
    <img src="{{ asset('img/' . $like['item']->id . '/' . $like['item']->image) }}">
    <p>{{$like['item']['item_name']}}</p>
    <p>単価</p>
    <p>{{$like['item']['price']}} 円</p>
    </form>
  @endforeach
  </div> 
  <a href="{{ route('home')}}">ホームへ戻る</a>

</div>
@endsection
