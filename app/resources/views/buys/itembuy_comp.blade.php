@extends('layouts.app')

@section('content')
<main>
  <div class="container">

  @csrf
    <div>
      <p>購入完了しました</p>
    </div>
    <a href="{{ route('buy')}}">ホームへ戻る</a>

  </form>
  
  </div>
</main>
@endsection
