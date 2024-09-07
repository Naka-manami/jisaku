@extends('layouts.app')

@section('content')
<main>
<div class="userlist">
      <div class ="userlist-header">
        <b class ="txet-center">ユーザ一覧</b>
      </div>
      <div class="userlist-body">
        <table class="table">
          <thead>
            <tr>
              <th scope='col'>ユーザ名</th>
              <th scope='col'>氏名</th>
              <th scope='col'>メールアドレス</th>
              <th scope='col'>郵便番号</th>
              <th scope='col'>住所</th>

              </th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
              <th scope ='col'>{{$user['account']}}</th>
              <th scope ='col'>{{$user['name']}}</th>
              <th scope ='col'>{{$user['email']}}</th>
              <th scope ='col'></th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
</main>
@endsection
