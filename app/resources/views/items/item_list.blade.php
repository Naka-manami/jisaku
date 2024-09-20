@extends('layouts.app')

@section('content')

<div class="container">

        <div class="row justify-content-center">
            
            <form action="{{ route('item.search') }}" method="GET"> 
            <div class="price.search">
                <label for="price">{{ __('価格') }}</label>

                <div class="kagen">
                <input type="number" name="kagen" id="kagen"  value ="{{$kagen}}">
                </div>
                〜
                <div class="jougen">
                <input type="number" name="jougen" id="jougen" value ="{{$jougen}}">
                </div>

                <div class="searchbox">
                <input type='text' class='form-control' name='keyword' value ="{{$keyword}}"/>
                <input type="submit" value="🔍">
            </div>
            </form>
        </div>
    </div>
<div class="container">
<p>検索結果</p>
@foreach($items as $item)
            <div class="item-list">
                <div class="list">
                
                <a href="{{route('item.detail',['id'=>$item['id']]) }}"> 
                <img src="{{ asset('img/' . $item->id . '/' . $item->image) }}">    
                    </a>
                    <h>{{ $item['item_name']}}</h>
                    <p>{{$item['price']}}</p>
                   
                </div>
            </div> 
 @endforeach

</div>
@endsection
