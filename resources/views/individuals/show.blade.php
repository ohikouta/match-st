<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <script src="https://kit.fontawesome.com/48447305da.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
         <div class="bg-blue-500 text-white p-4">
            <h1 class="text-4xl font-bold">IEEE</h1>
            <!-- /users/create へのリンクを絶対URLで生成 -->
        </div>
        <!-- ナビゲーションセクション -->
        <div class="bg-blue-500 p-4">
            <!--<a href="{{ url('/users/profile') }}" class="font-bold text-white">プロフィール編集</a>-->
            <a href="{{ url('/events/index') }}" class="font-bold text-white">イベントを企画する</a>
            <a href="{{ url('/events/look') }}" class="font-bold text-white">イベント一覧</a>
            <a href="{{ url('/individuals/plan') }}" class="font-bold text-white">コミュニティをつくる</a>
        </div>
        <div class="w-full h-64 flex items-center justify-center overflow-hidden bg-gradient-to-b from-blue-100 to-blue-500">
            <img src='{{ asset($individual->image) }}' class="object-center object-cover h-full">
        </div>
        <div class="flex justify-center">
            <div class="w-3/4 flex flex-col border border-solid border-gray-300 shadow-md mt-10 p-10">
                <h1 class="border-l-4 border-blue-500 pl-4 font-bold text-4xl">{{ $individual->title }}</h1>
                <p class="text-lg font-bold">{{ $individual->summary }}</p>
                <h2 class="text-xl font-bold border-l-4 border-blue-500 pl-4">管理者</h2>
              

                @if ($individual && $individual->user)
                    {{ $individual->user->name }}
                @endif
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>