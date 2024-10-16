<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://kit.fontawesome.com/48447305da.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            <div class="bg-blue-500 text-white p-4">
                <a href="{{ route('users.index') }}" class="block text-4xl font-bold">IEEE ～仲間をつくる～</a>
            </div>
            <!-- ナビゲーションセクション -->
             <div class="bg-blue-500 p-4 flex justify-between">
                <div>
                    <a href="{{ url('/individuals/plan') }}" class="sm:text-sm md:text-base font-bold text-white">コミュニティをつくる</a>
                    <a href="{{ route('events.plan') }}" class="sm:text-sm md:text-base font-bold text-white">イベントを企画する</a>
                </div>
                <div class="flex justify-between">
                    <!-- ログアウトボタン -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <!-- ログアウトボタン -->
                        <button type="submit" class="text-xl bg-green-500 p-2 rounded-md hover:bg-green-600">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </header>
        <!-- 画像 -->
        <div class="w-full h-64 overflow-hidden">
        </div>
        <main class="flex justify-center">
            <div class="m-12 p-10 w-3/4 flex flex-col items-center bg-gray-200 border border-solid shadow-mg rounded-lg">
                <h1 class="text-4xl font-bold border-l-4 border-blue-500 pl-4">イベントの作成</h1>
                <form id="yourForm" method="POST" action="{{ route('events.store') }}">
                    @csrf
                    <!-- タイトル -->
                    <div class="form-group mt-5">
                        <label for="name" class="block text-lg font-bold">イベントタイトル</label>
                        <input type="text" name="name" id="name" class="form-control w-full" required>
                    </div>
                    <!-- 概要 -->
                    <div class="form-group mt-5">
                        <label for="summary" class="block text-lg font-bold">イベント概要</label>
                        <textarea name="summary" id="summary" class="form-control w-full"></textarea>
                    </div>
                    <!-- 開催日 -->
                    <div class="form-group mt-5">
                        <label for="summary" class="block text-lg font-bold">開催日</label>
                        <input type="date" name="event_date" id="event_date" class="form-control w-full" required>
                    </div>
                    <!-- 住所 -->
                    <div class="form-group mt-5">
                        <label for="address" class="block text-lg font-bold">住所</label>
                        <input type="text" name="address" id="address" class="form-control w-full" required>
                    </div>
                    <!-- 募集人数 -->
                    <div class="form-group mt-5">
                        <label for="max_participants" class="block text-lg font-bold">募集人数</label>
                        <input type="number" name="max_participants" id="max_participants" class="form-control w-full" required>
                    </div>
                    
                    <!-- 登録ボタン -->
                    <button id="yourEventButton" type="submit" class="mt-6 btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">登録</button>
                </form>
            </div>
        </main>
        
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>