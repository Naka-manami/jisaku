@extends('layouts.app')

@section('content')
<main>
    <div class="container">
      <div class="itemlist">
        <form action="{{ route('back.buyconf')}}" method="post">
        @csrf
        
              <div class ="itemlist-header">
                <b class ="txet-center">届け先情報登録</b>
              </div>
              
              <div class="form-group">
                <label for="item_name">お届け先氏名</label>
                <input type="text" class="form" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="price">お届け先郵便番号</label>
                <input type="text" class="form" id="post" name="post">
              </div>
              <div class="form-group">
                <label for="address">お届け先住所</label>
                <textarea class="form" name="address" id="address" ></textarea>
              </div>
              
              <button type='submit' class='btn'>登録</button>
        </form>
      </div>
    </div>
</main>
@endsection
