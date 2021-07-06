<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>blogList</title>
        <link rel="stylesheet" href="{{secure_asset('/assets/css/style.css')}}">
    </head>
    <body>
        <header>
            <h1>blog</h1>
            <div class="myInfo">
                <a href="">投稿する</a>
                <a href="">ログインする</a>
            </div>
        </header>
        <main>
            <div class="postList">
                <ul>
                    @foreach ($posts as $post)
                    <li>
                        <h2>{{$post->title}}</h2></h2>
                        <p>{{$post->body}}</p>
                    </li>
                    <div class="line"></div>
                    @endforeach
                </ul>
                <div class="more10">
                    <a href="" id="minus10">previus</a>
                    <a href="" id="plus10">next</a>
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