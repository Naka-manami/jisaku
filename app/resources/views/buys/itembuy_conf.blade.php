@extends('layouts.app')

@section('content')
  <div class="container">
  <form action="{{ route('itembuy.comp')}}" method="post">
  @csrf
    <h1>注文を確定する</h1>
    <div class="">
       <div class ="total">
        <label for="total">ご請求額</label>
            @foreach($carts as $cart)
            @php
              $total = $cart['item']['price'] * $cart['count'];
              $totals += $total;
              @endphp
            @endforeach</div>
            <p>{{$totals}} 円</p>
      </div>
      <div class ="account">
        <div class ="accountdetail">
          <label for="total">お届け先氏名</label>
          <p> </p>
          <label for="total">お届け先郵便番号</label>
          <p> </p>
          <label for="total">お届け先住所</label>
          <p> </p>
        </div>
        <a href="{{ route('user.detail')}}">お届け先登録</a>
      </div>
    </div>
    <input type="submit" value="購入">
  </form>
  
  </div>
@endsection
