<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <style>
        .loved i {
        color: red !important;
        }
    </style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ホーム
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">新規会員登録</a>
                                </li>
                            @endif
                        @else
                        <!-- ログイン後ヘッダー -->
                             <li class="nav-favo">
                                <a class="nav-link" href="{{ route('favo') }}">お気に入り</a>
                            </li>
                            <li class="nav-cart">
                                <a class="nav-link" href="{{ route('cart.list') }}">カート</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    マイページ <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('account') }}">
                                            {{__('アカウント情報')}}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('buyhistory') }}">
                                            {{__('購入履歴')}}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('admin.home')}}">事業者ページへ(最後に削除)</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
       $(function () {
            var like = $('.js-like-toggle');
            var likeItemId;

            like.on('click', function () {
                var $this = $(this);
                likeItemId = $this.data('itemid');
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/ajaxlike',  //routeの記述
                        type: 'POST', //受け取り方法の記述（GETもある）
                        data: {
                            'item_id': likeItemId //コントローラーに渡すパラメーター
                        },
                })

                    // Ajaxリクエストが成功した場合
                    .done(function (data) {
            //lovedクラスを追加
                        $this.toggleClass('loved'); 

            //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                        $this.next('.likesCount').html(data.itemLikesCount); 

                    })
                    // Ajaxリクエストが失敗した場合
                    .fail(function (data, xhr, err) {
            //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
            //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                        console.log('エラー');
                        console.log(err);
                        console.log(xhr);
                    });
                
                return false;
            });
}); 
    </script>
</body>
</html>
