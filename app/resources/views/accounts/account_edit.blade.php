@extends('layouts.app')

@section('content')
<main>
  <div class ="container">
    <b>アカウント情報</b>
    <form action="{{ route('account.conf')}}" method="post">
    @csrf
    <div class ="label left">
			<label for="account_name">ユーザ名</label>
      <label for="email">メールアドレス</label>
			<label for="name">氏名</label>
			<label for="tel">電話番号</label>
			<label for="post">郵便番号</label>
			<label for="address">住所</label>
    </div>
    <div class ="label right">
			
    </div>
    <!-- ポストで渡す -->
    <button type='submit' class='btn '>次へ</button>
    <button class="delete" class="btn" href="">削除</a>
    </div>
  </form>
  </div>
    
</main>
@endsection
