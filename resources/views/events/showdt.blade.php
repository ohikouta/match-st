<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://kit.fontawesome.com/48447305da.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css'])
        <script src="https://code.jquery.com/jquery.js"></script> 
        <script src="{{ asset('/js/map.js') }}"></script>
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
            <!-- ページ上部イメージ -->
            <div class="w-full h-64 overflow-hidden">
                <img src='{{ asset($eventImage->url) }}' class="object-center object-cover w-full h-full">
            </div>
        <main class="flex justify-center">
            <!-- map表示のためのアドレス指定 -->
            <div class="hidden">
                <span id="eventAddress">{{ $event->address }}</span>
            </div>
            <div class="w-3/4 my-10 p-5 flex flex-col items-center border border-solid rounded-lg shadow-md">
                <div class="flex-col ">
                    <!-- 管理者のみ表示 -->
                    @if(auth()->check() && $event->admin_id === auth()->user()->id)
                        <a href="{{ route('events.admin', ['id' => $event->id]) }}" class="block text-center text-white  font-bold bg-green-500 font-bold mb-10 rounded-md hover:bg-green-600">管理者ページ</a>
                    @endif
                    <!-- 全員表示 -->
                    <h2 class="border-l-4 border-blue-500 pl-2 text-xl font-bold mb-2">タイトル</h2>
                    <p class="font-bold mb-4 pl-4">{{ $event->name }}</p>
                    <h2 class="border-l-4 border-blue-500 pl-2 text-xl font-bold mb-2">概要</h2>
                    <p class="font-bold mb-4 pl-4">{{ $event->summary }}</p>
                    <h2 class="border-l-4 border-blue-500 pl-2 text-xl font-bold mb-2">開催日時</h2>
                    <p class="font-bold mb-4 pl-4">{{ $event->event_date }}</p>
                    <h2 class="border-l-4 border-blue-500 pl-2 text-xl font-bold mb-2">住所</h2>
                    <p class="font-bold mb-4 pl-4">{{ $event->address }}</p>
                    <div id="map" class="flex items-center mb-4" style="height:500px; width:500px;"></div>
                </div>
                <a href="{{ route('events.requestResult', ['eventid' => $event->id]) }}" class="font-bold text-white bg-green-500 px-10 py-2 rounded-md hover:bg-green-600">応募する</a>
            </div>
            
        </main>
        <!-- 他のイベント情報を表示 -->
        
    
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
        <script src="{{ asset('/js/map.js') }}"></script>
    </body>
</html>