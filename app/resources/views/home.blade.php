@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('item.list') }}" method="GET"> 
            <div class="price.search">
                <label for="price">{{ __('価格') }}</label>

                <div class="kagen">
                <input type="number" name="kagen.price" id="kagen.price" >
                </div>
                〜
                <div class="jougen">
                <input type="number" name="jougen.price" id="jougen.price" >
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
                <div class="no1">
                    <a href="遷移させたいURL"> 
                        <img src="images/pic1.jpeg" id="pic">
                    </a>
                    <h>商品名</h>
                    <p>金額</p>
                </div>
                <div class="no2">
                    <a href="遷移させたいURL"> 
                        <img src="images/pic1.jpeg" id="pic">
                    </a>
                    <h>商品名</h>
                    <p>金額</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
