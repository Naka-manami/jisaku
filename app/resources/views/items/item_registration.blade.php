@extends('layouts.app')

@section('content')
<main>
    <div class="itemlist">
    <form action="{{ route('item.registrationcomp')}}" method="post"  enctype="multipart/form-data">
    @csrf
    
          <div class="form-group">
            <label for="image">画像登録</label>
           
            <input type="file" class="form" id="image" name="image" value="">

          </div>
          <div class="form-group">
            <label for="item_name">商品名</label>
            <input type="text" class="form" id="item_name" name="item_name" valeu="{{ old('item_name') }}">
          </div>
          <div class="form-group">
            <label for="price">価格</label>
            <input type="text" class="form" id="price" name="price" value="{{old ('price') }}">
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
