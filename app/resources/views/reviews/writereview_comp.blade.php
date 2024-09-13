@extends('layouts.app')

@section('content')
<main>
  <div class="container">

  @csrf
    <div>
      <p>レビューを投稿しました</p>
    </div>
    <a href="{{ route('home')}}">ホームへ戻る</a>

  </form>
  
  </div>
</main>
@endsection
