@extends('layouts.app')

@section('content')
<main>
    <div class='adhomelist'>
        <div class='registration'>
            <a href="{{ route('item.registration')}}"><h1>商品登録</h1></a>
        </div>
        <div class='admin_itemlist'>
            <a href="{{ route('admin.itemlist')}}"><h1>商品リスト</h1></a>
        </div>
        <div class='admin_userlist'>
            <a href="{{ route('admin.userlist')}}"><h1>ユーザリスト</h1></a>
        </div>
    </div>
</main>
@endsection
