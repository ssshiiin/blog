<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>blogList</title>
    <link rel="stylesheet" href="{{secure_asset('/assets/css/style.css')}}">
</head>

<body>
    <header>
        <a href="/posts">Blog</h1>
        <div class="myInfo">
            <a href="/posts/create">投稿する</a>
            <a href="">ログインする</a>
        </div>
    </header>
    <main>
        <div class="postList">
            <div class="show">
                <div class="showTitle">
                    <h2>{{$post->title}}</h2>
                </div>
                <div class="line"></div>
                <div class="showContent">
                    <p>{{$post->body}}</p>
                </div>
                <div class="line"></div>
                <div class="backHome">
                    <div class="date">
                        <p>{{$post->update_at}}</p>
                    </div>
                    <div class="back">
                        <a href="/posts/{{$post->id}}/edit">編集する</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="search">
                <form>
                    <input type="text">
                    <input type="submit" value="search">
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
        <p>2021年7月5日</p>
    </footer>
</body>

</html>