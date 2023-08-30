<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
    </head>
    <body class="antialiased">
        <h1>IEEE</h1>
        <!-- ログイン画面へ推移するボタンを配置したい -->
        <a href="{{ url('/users/index') }}">ログイン</a>
        <a href="{{ url('/register') }}">新規登録</a>
        <div class=community>
            <h2>コミュニティ一覧</h2>
            
        </div>
        <div>
            <h2>所属団体一覧</h2>
        </div>
        <div>
            <h2>イベント</h2>
        </div>
    </body>
</html>
