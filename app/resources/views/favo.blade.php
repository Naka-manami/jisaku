@extends('layouts.app')

@section('content')
<div class="container">
<h>お気に入り一覧</h>
<form action="{{ route('favo.cart')}}" method="post">
@csrf

  <div class="itemcandi">
    <input type="checkbox" checked="checked" name="checkbox" value="0">
    <a href="遷移させたいURL"> 
      <img src="images/pic1.jpeg" id="pic">
    </a>
    <p class="itemname"></p>
    <p class="price"></p>
    <p class="favodate"></p>
    <button type='submit' class='cartin'>カートに入れる</button>

  </div>
</form>
</div>
@endsection
