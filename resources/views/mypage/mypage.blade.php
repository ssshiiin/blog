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
            <a href="/posts" style=" font-family: 'Nunito';">Blog-自分の投稿</a>
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
            <div class="postList">
                @if($user->profile)
                    <p>{{$user->name}}のプロフィール</p>
                    <p>{{$user->profile->profile}}</p>
                    <a class="profileLink" href="/profile">編集する</a>
                @else
                    <a class="profileLink" href="/profile">プロフィールを作ろう</a>
                @endif
                <div class="line"></div>
                <ul>
                    @foreach ($posts as $post)
                    <li>
                        <a href="/posts/{{ $post->id }}">{{$post->title}}</a>
                        @if(mb_substr($post->body, 20))
                        <p>{{mb_substr($post->body, 0, 20) . "..."}}<a href="/posts/{{ $post->id }}">続きを読む</a></p>
                        @else
                        <p>{{mb_substr($post->body, 0, 20)}}</p>
                        @endif
                    </li>
                    <div class="line"></div>
                    @endforeach
                </ul>
            </div>
            <div class="sidebar">
                <div class="search">
                    <form action="/posts/search/title" method="get">
                        @csrf
                        <input type="text" name="title">
                        <input type="submit" value="search">
                    </form>
                    <form action="/posts/search/period" method="GET">
                        @csrf
                        <select name="year">
                            @for($i = 1990; $i <= date("Y"); $i++)
                            <option value="{{$i}}">{{$i}}年</option>
                            @endfor
                        </select>
                        <select name="month">
                            @for($i = 1; $i <= 12; $i++)
                            <option value="{{$i}}">{{$i}}月</option>
                            @endfor
                        </select>
                        <select name="day">
                            @for($i = 1; $i <= 31; $i++)
                            <option value="{{$i}}">{{$i}}日</option>
                            @endfor
                        </select>
                        <br>
                        <input type="submit" value="から今日までの記事を検索">
                    </form>
                </div>
                <div class="category">
                    <ol>
                        <a href="">ニュース</a>
                        <a href="">コロナ</a>
                        <a href="">旅行</a>
                        <a href="">恋愛</a>
                        <a href="">仕事</a>
                        <a href="">IT</a>
                        <a href="">プログラミング言語</a>
                        <a href="">転職</a>
                        <a href="">娯楽</a>
                    </ol>
                </div>
            </div>
        </main>
        <footer>
            <h2>株式会社-------</h2>
            <p>{{now()}}</p>
        </footer>
    </body>
</html>
        