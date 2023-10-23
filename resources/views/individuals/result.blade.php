<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1">
        <title>Individual-Result</title>
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script type="module" src="{{ asset('js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/48447305da.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <header>
            <div class="bg-blue-500 text-white p-4">
                <a href="{{ route('users.index') }}" class="block text-4xl font-bold">IEEE ～仲間をつくる～</a>
                <!-- /users/create へのリンクを絶対URLで生成 -->
            </div>
            <!-- ナビゲーションセクション -->
            <div class="bg-blue-500 p-4 flex justify-between">
                <div>
                    <a href="{{ url('/individuals/plan') }}" class="font-bold text-white">コミュニティをつくる</a>
                    <a href="{{ route('events.plan') }}" class="font-bold text-white">イベントを企画する</a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <!-- ログアウトボタン -->
                    <button type="submit" class="underline text-sm text-gray-600 bg-green-300 p-2 rounded-lg hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-sign-out-alt"></i>{{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </header>
        <main class="flex justify-center">
            <div class="w-3/4 my-10 p-5 flex flex-col items-center border border-solid rounded-lg shadow-md">
                <div class="flex-col ">
                    <p>以下のコミュニティが作成されました</p>
                    <h2 class="border-l-4 border-blue-500 pl-2 text-xl font-bold mb-2">タイトル</h2>
                    <p class="font-bold mb-4 pl-4">{{ $individual->name }}</p>
                    <h2 class="border-l-4 border-blue-500 pl-2 text-xl font-bold mb-2">概要</h2>
                    <p class="font-bold mb-4 pl-4">{{ $individual->summary }}</p>
                </div>
                <a href="{{ route('users.index') }}" class="font-bold text-white bg-green-500 px-10 py-2 rounded-md hover:bg-green-600">ホームに戻る</a>
            </div>
        </main>
        
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>