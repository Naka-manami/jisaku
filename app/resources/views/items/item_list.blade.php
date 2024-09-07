@extends('layouts.app')

@section('content')
@foreach($items as $item)
<div class="container">
            <div class="item-list">
                <div class="list">
                   
                    <a href="{{ route('item_detail',['id'=>$result['id']]) }}"> 
                        <img src>{{$item['image']}}<img>
                    </a>
                    <h>{{ $item['item_name']}}</h>
                    <p>{{$item['price']}}</p>
                   
                </div>
            </div>
 @endforeach
 
</div>
@endsection
