<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script type="module" src="{{ asset('js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/48447305da.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
         <div class="bg-blue-500 text-white p-4">
            <!--<h1 class="text-4xl font-bold">IEEE ～仲間をつくる～</h1>-->
            <a href="{{ route('users.index') }}" class="block text-4xl font-bold">IEEE ～仲間をつくる～</a>
            <!-- /users/create へのリンクを絶対URLで生成 -->
        </div>
        <!-- ナビゲーションセクション -->
        <div class="bg-blue-500 p-4">
            <!--<a href="{{ url('/users/profile') }}" class="font-bold text-white">プロフィール編集</a>-->
            <a href="{{ url('/events/index') }}" class="font-bold text-white">イベントを企画する</a>
            <a href="{{ url('/individuals/plan') }}" class="font-bold text-white">コミュニティをつくる</a>
        </div>
        <div class="w-full h-64 overflow-hidden">
            <img src='{{ asset($adminImage->url) }}' class="object-center object-cover w-full h-full">
        </div>
        
        <div class="flex flex-col justify-center items-center p-10">
            <!-- メインコンテンツ -->
            <div class="container flex flex-col items-center border border-solid rounded-lg shadow-md">
                <form action="{{ route('events.update', ['id' => $event->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="block font-bold text-xl border-l-4 border-blue-500 pl-2 mt-5 mb-3">タイトル</label>
                        <input type="text" name="name" id="name" class="block form-control w-full" value="{{ $event->name }}" required>
                    </div>
            
                    <div class="form-group">
                        <label for="summary" class="block font-bold text-xl border-l-4 border-blue-500 pl-2 mt-5 mb-3">企画概要</label>
                        <textarea name="summary" id="summary" class="block form-control w-full" required>{{ $event->summary }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="date" class="block font-bold text-xl border-l-4 border-blue-500 pl-2 mt-5 mb-3">開催日時</label>
                        <input type="date" name="event_date" id="event_date" class="block form-control w-full" required>
                    </div>
                    
                    <div class="form-group mt-5">
                        <label for="address" class="block font-bold text-xl border-l-4 border-blue-500 pl-2 mt-5 mb-3">住所</label>
                        <input type="text" name="address" id="address" class="block form-control w-full" required>
                    </div>
            
                    <div class="flex justify-center">
                        <button type="submit" class="my-5 block btn btn-primary font-bold text-white bg-green-500 py-2 px-10 rounded-md hover:bg-green-600">更新</button>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>  
        </div>
        <!-- ナビゲーションセクション -->
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>