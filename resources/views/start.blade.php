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
        <div class="bg-blue-500 text-white p-4">
            <h1 class="text-4xl font-bold">IEEE</h1>
            <div class="link flex justify-end">
                <!--<a href="{{ url('/users/index') }}" class="bg-red-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full mr-4 transition duration-300 ease-in-out">ログイン</a>-->
                <a href="{{ url('/users/index') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full mr-4 transition duration-300 ease-in-out">ログイン</a>
                <a href="{{ url('/register') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full mr-4 transition duration-300 ease-in-out">新規登録</a>
            </div>
        </div>
        <!-- ログイン画面へ推移するボタンを配置したい -->
        <div class="main-container bg-green-200 flex">
            <div class="community w-1/2 p-4 bg-green-300 rounded-lg">
                <h2 class="text-3xl font-bold">コミュニティ一覧</h2>
                @foreach ($individuals as $individual)
                    <h3 class="text-xl font-bold">{{ $individual->title }}</h3>
                    <p>{{ $individual->summary }}</p>
                @endforeach
            </div>
            <div class='event w-1/2 p-4 bg-green-300 rounded-lg'>
                <h2 class="text-3xl font-bold">イベント</h2>
                @foreach ($events as $event)
                    <h3 class="text-xl font-bold">{{ $event->name }}</h3>
                    <p>{{ $event->summary }}</p>
                @endforeach
            </div>
            
        </div>
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10 sticky bottom-0">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>
