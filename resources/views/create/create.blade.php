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
            <div class="createPost">
                <h2>投稿する</h2>
                <form action="/posts" method="POST">
                    @csrf
                    <input class="title" type="text" name="post[title]" placeholder="タイトル">
                    <br>
                    <textarea class="postBody" name="post[body]" placeholder="コンテント"></textarea>
                    <br>
                    <input class="postSubmit" type="submit" value="保存">
                </form>
            </div>
        </main>
        <footer>
            <h2>株式会社-------</h2>
            <p>2021年7月5日</p>
        </footer>
    </body>

</html>