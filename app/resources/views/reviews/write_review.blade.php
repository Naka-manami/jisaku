@extends('layouts.app')

@section('content')
<main>
    <div class="itemlist">
    <form action="{{ route('write.comp',['id'=>$id])}}" method="post">
    @csrf
          <div class="form-group">
          <p>購入品：{{$item['item_name']}}</p>
          <img src="{{ asset('img/' . $item->id . '/' . $item->image) }}">

            <label for="title">タイトル</label>
            <input type="text" class="form" id="title" name="title" value="{{ old('title') }}">
          </div>
          <div class="form-group">
            <label for="content">コメント</label>
            <textarea class='form' name='content' id="content">{{old ('content') }}</textarea>
          </div>
          <button type='submit' class='btn '>登録</button>
    </form>
    </div>
</main>
@endsection
