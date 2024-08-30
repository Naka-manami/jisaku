@extends('layouts.app')

@section('content')
<main>
  <div class ="container">
    <b>アカウント情報</b>
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
   
    <a class="hennkou" href="{{ route('account.edit') }}">{{__('確定')}}</a>
  
  </div>
    
</main>
@endsection
