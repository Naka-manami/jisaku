@extends('layouts.app')

@section('content')
<main>
  <div class ="container">
    <b>アカウント情報</b>
    <form action="{{ route('account.comp',['id'=>$user['id']])}}" method="post">
    @csrf
    <div class ="label left">
			<!-- <label for="account_name">ユーザ名</label> -->
      <label for="email">メールアドレス</label>
			<label for="name">氏名</label>
			<label for="tel">電話番号</label>
			<label for="post">郵便番号</label>
			<label for="address">住所</label>
    </div>
    <div class ="label right">
        <div class ="itemlist-header">
          <label for="account_name">ユーザ名</label>
          <div class="form-group">
            <input type="text" class="form" id="account" name="account" value="{{ $user['account'] }}">
          </div>
        </div>
        <div class ="itemlist-header">
          <label for="account_name">メールアドレス</label>
          <div class="form-group">
            <input type="text" class="form" id="email" name="email" value="{{ $user['email'] }}">
          </div>
        </div>
        <div class ="itemlist-header">
          <label for="account_name">氏名</label>
          <div class="form-group">
            <input type="text" class="form" id="name" name="name" value="{{ $user['name']  }}">
          </div>
        </div>
        <div class ="itemlist-header">
          <label for="account_name">電話番号</label>
          <div class="form-group">
            <input type="text" class="form" id="tel" name="tel" value="{{ $user['tel'] }}">
          </div>
        </div>
        <div class ="itemlist-header">
          <label for="account_name">郵便番号</label>
          <div class="form-group">
            <input type="text" class="form" id="post" name="post" value="{{ $user['post']  }}">
          </div>
        </div>
        <div class="form-group">
            <label for="detail">住所</label>
            <div>
              <textarea class='form' name='address' id="address" name="detail">{{ $user['address']  }}</textarea>
            </div>
        </div>

    </div>
    <!-- ポストで渡す -->
    <button type='submit' class='btn '>次へ</button>
    <button class="delete" class="btn" href="">削除</a>
    </div>
  </form>
  </div>
    
</main>
@endsection
