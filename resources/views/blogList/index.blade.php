<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>blogList</title>
        <link rel="stylesheet" href="{{secure_asset('/assets/css/style.css')}}">
    </head>
    <body>
        <header>
            <a href="/posts">Blog</a>
            <div class="myInfo">
                <a href="/posts/create">投稿する</a>
                <a href="">ログインする</a>
            </div>
        </header>
        <main>
            <div class="postList">
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
                <div class="more10">
                    <a href="" id="minus10">previus</a>
                    <a href="" id="plus10">next</a>
                    <div class='paginate'>
                    {{ $posts->links() }}
                    </div>
                </div>
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