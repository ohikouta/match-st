<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Fonts -->
    </head>
    <body class="antialiased">
        <h1 class="bg-blue-500 text-white p-4">IEEE</h1>
        <!-- ログイン画面へ推移するボタンを配置したい -->
        <div class="link">
            <!--<a href="{{ url('/users/index') }}" class="bg-red-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full mr-4 transition duration-300 ease-in-out">ログイン</a>-->
            <a href="{{ url('/users/index') }}" class="bg-blue-300">ログイン</a>
            <a href="{{ url('/register') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full mr-4 transition duration-300 ease-in-out">新規登録</a>
        </div>
        <div class=community>
            <h2>コミュニティ一覧</h2>
            
        </div>
        <div>
            <h2>所属団体一覧</h2>
        </div>
        <div　class='event'>
            <h2>イベント</h2>
            @foreach ($events as $event)
                <h3>{{ $event->name }}</h3>
                <p>{{ $event->summary }}</p>
            @endforeach
        </div>
    </body>
</html>
