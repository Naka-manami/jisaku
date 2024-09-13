@extends('layouts.app')

@section('content')
  <div class="container">
  <form action="{{ route('itembuy.comp',['id'=>$cart['id']]) }}" method="post">
  @csrf
    <h1>注文を確定する</h1>
    <div class="">
       <div class ="total">
        <label for="total">ご請求額</label>
            @php
              $total = $cart['item']['price'] * $cart['count'];
              @endphp
        </div>
            <p>{{$total}} 円</p>
      </div>
      <div class ="account">
        <div class ="accountdetail">

          <label for="total">お届け先氏名</label>
          <p>{{$users->name }}</p>
          <label for="total">お届け先郵便番号</label>
          <p>{{$users->post}}</p>
          <label for="total">お届け先住所</label>
          <p>{{$users->address}}</p>

        </div>
        <a href="{{ route('user.detail',['cartid'=>$cart['id']])}}">お届け先登録</a>
      </div>
    <input type="submit" value="購入">

  </form>
  
  </div>
@endsection
