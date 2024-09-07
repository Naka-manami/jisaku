@extends('layouts.app')

@section('content')
<main>
  <div class="container">
  <form action="{{ route('home',['id'=>$item['id']&&$user['id'])}}" method="get">
  @csrf
    <div>
      <p>購入完了しました</p>
    </div>
    <input type="submit" value="ホームへ戻る">
  </form>
  
  </div>
</main>
@endsection
