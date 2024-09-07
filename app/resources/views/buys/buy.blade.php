@extends('layouts.app')

@section('content')
<main>
  <div class ="container">
    <h1>注文を確定する</h1>
    <div class ="order">
    <form action="{{ route('back.buycomp')}}" method="post">
    @csrf
        <table class="table">
          <tbody>
              <tr>
                <td scope='col'>商品の小計</td>
                <td scope='col'></td>
              </tr>
              <tr>
              <td scope='col'>配送料・手数料</td>
              <td scope='col'>氏名</td>
              </tr>
              <tr>
                <td scope='col'>ご請求額</td>
                <td scope='col'>メールアドレス</td>
              </tr>
              <tr>
              <td scope='col'>お支払方法</td>
              <td scope='col'></td>
              </tr>
              <tr>
              <td scope='col'>お届け先氏名</td>
              <td scope='col'></td>
              </tr>
              <tr>
              <td scope='col'>お届け先番号</td>
              <td scope='col'></td>
              </tr>
              <tr>
              <td scope='col'>お届け先住所</td>
              <td scope='col'></td>
              </tr>
          </tbody>
        </table>
        <input type="submit" value="購入を決定する">
    </div>
  </form>
  </div>
    
</main>
@endsection
