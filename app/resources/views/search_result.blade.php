@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('item.list') }}" method="GET"> 
            <div class="price.search">
                <label for="price">{{ __('価格') }}</label>

                <div class="kagen">
                <input type="number" name="kagen" id="kagen"  value ="">
                </div>
                〜
                <div class="jougen">
                <input type="number" name="jougen" id="jougen" value ="">
                </div>

                <div class="searchbox">
                <input type='text' class='form-control' name='keyword'/>
                <input type="submit" value="🔍">
            
            </div>
            </form>
        </div>
    </div>
    <!-- ↓商品一覧 -->
    <div class="container2">
    <!-- 検索結果のアイテムを表示検索していない時は表示なし -->
            <div class="item-list">
                @foreach($items as $item)
                <div class="no1">
                    <a href="{{route('item.detail',['id'=>$item['id']]) }}"> 
                    <img src="{{ asset('img/' . $item->id . '/' . $item->image) }}">
                    </a>
                    <h>{{$item['item_name']}}</h>
                    <p>{{$item['price']}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection
