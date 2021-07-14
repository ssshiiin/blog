<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>blogList</title>
        <link rel="stylesheet" href="{{secure_asset('/assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="/posts" style=" font-family: 'Nunito';">Blog-{{Auth::user()->name}}さんの投稿</a>
            <div class="myInfo">
                @auth
                    <a href="/mypage/{{Auth::user()->id}}">{{Auth::user()->name}}</a>
                    <a href="/posts/create">投稿する</a>
                    <a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >ログアウトする</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href={{route("login")}}>ログインする</a>
                    <a href={{route("register")}}>会員登録する</a>
                @endauth
            </div>
        </header>
        <main>
            <h1>{{Auth::user()->name}}さん、ようこそ！</h1>
        </main>
        <footer>
            <h2>株式会社-------</h2>
            <p>{{now()}}</p>
        </footer>
    </body>
</html>
        