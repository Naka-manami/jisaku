@extends('layouts.app')

@section('content')
<main>
  <div class ="container">
    <b>アカウント情報</b>
    <div class ="label left">
      <label for="account">ユーザ名</label>
      <label for="name">氏名</label>
      <label for="email">メールアドレス</label>
			<label for="tel">電話番号</label>
			<label for="post">郵便番号</label>
			<label for="address">住所</label>
    </div>
    <div class ="label right">

      <label for="name">{{$user->account }}</label>      
      <label for="name">{{$user->name }}</label>          
      <label for="email">{{ $user->email}}</label>
			<label for="tel">{{ $user->tel}}</label>
			<label for="post">{{ $user->post}}</label>
			<label for="address">{{ $user->address}}</label>

    </div>
   
    <a class="hennkou" href="{{ route('account.edit',['id'=>$user['id']]) }}">{{__('変更')}}</a>
  
  </div>
    
</main>
@endsection
