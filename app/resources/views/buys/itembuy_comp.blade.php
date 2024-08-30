@extends('layouts.app')

@section('content')
<main>
  <div class="container">
  <form action="{{ route('home')}}" method="get">
  @csrf
    <p>商品内容を変更しました</p>
    <input type="submit" value="ホームへ戻る">
  </form>
  </div>
</main>
@endsection
