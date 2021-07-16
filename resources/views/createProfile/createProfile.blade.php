<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>blogList</title>
        <link rel="stylesheet" href="{{secure_asset('/assets/css/style.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>
    <body>
        <form action='/profile/{{Auth::user()->id}}' method="POST">
            @csrf
            <textarea name="profileContent" placeholder="自己紹介"></textarea>
            <input type="submit" value="保存">
        </form>
        
    </body>
</html>