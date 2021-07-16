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
        <a href="/posts" style=" font-family: 'Nunito';">Blog-投稿の詳細</a>
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
            <div class="show">
                <div class="showTitle">
                    <h2>{{$post->title}}</h2>
                </div>
                <div class="line"></div>
                <div class="showContent">
                    <p>{{$post->body}}</p>
                    <div class="image-post">
                        <img src={{$post->image_path}}>
                    </div>
                </div>
                <div class="line"></div>
                <div class="backHome">
                    <div class="date">
                        <p>{{$post->updated_at}}</p>
                    </div>
                    <div class="back">
                        <?php $authUser = Auth::user()->id; ?>
                        @if(($authUser) == ($post->user->id))
                        <form action="/posts/{{$post->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="/posts/{{$post->id}}/edit">編集する</a>
                            <input type="submit" value="削除する" onclick="return postdelete();">
                        </form>
                        @else
                        <a href="/userpage/{{$post->user->id}}">{{$post->user->name}}</a>
                        @endif
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
        <h2>管理人：shin</h2>
        <p><?php echo(now()) ?></p>
    </footer>
    <script type="text/javascript" src="{{secure_asset('/assets/js/delete.js')}}"></script>
</body>

</html>