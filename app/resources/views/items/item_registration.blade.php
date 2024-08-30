@extends('layouts.app')

@section('content')
<main>
    <div class="itemlist">
    <form action="{{ route('item.registrationcomp')}}" method="post">
    @csrf
    
          <div class ="itemlist-header">
            <b class ="txet-center">商品登録</b>
          </div>
          <div class="form-group">
            <label for="image"></label>
            <!-- <img src="" id="pic" name="" value="{{ old('image') }}"> -->
            <input type="text" class="form" id="image" name="image" valeu="{{ old('image') }}">

          </div>
          <div class="form-group">
            <label for="item_name">商品名</label>
            <input type="text" class="form" id="item_name" name="item_name" valeu="{{ old('item_name') }}">
          </div>
          <div class="form-group">
            <label for="price">価格</label>
            <input type="text" class="form" id="price" name="price" valeu="{{old ('price') }}">
          </div>
          <div class="form-group">
            <label for="detail">商品詳細</label>
            <textarea class='form' name='detail' id="detail" name="detail">{{old ('detail') }}</textarea>
          </div>
          <!-- <label for='detail' class='mt-2'>メモ</label>
           <textarea class='form-control' name='detail'>{{old ('de') }}</textarea> -->
          <button type='submit' class='btn '>登録</button>
    </form>
    </div>
</main>
@endsection
