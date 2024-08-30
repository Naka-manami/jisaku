@extends('layouts.app')

@section('content')
<main >
    <div class="itemlist">
      <div class ="itemlist-header">
        <b class ="txet-center">商品一覧</b>
      </div>
      <div class="itemlist-body">
        <table class="table">
          <thead>
            <tr>
              <th scope='col'>商品名</th>
              <th scope='col'>商品価格</th>
              <th scope='col'>売上個数</th>
              <th scope='col'>売上額</th>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope ='col'></th>
              <th scope ='col'></th>
              <th scope ='col'></th>
              <th scope ='col'></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</main>
@endsection
