<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="bg-blue-500 text-white p-4">
            <h1 class="text-4xl font-bold">Student Information</h1>
            <!-- /users/create へのリンクを絶対URLで生成 -->
            <a href="{{ url('/users/profile') }}">プロフィール編集</a>
            <a href="{{ url('/events/index') }}">イベントを企画する</a>
            <a href="{{ url('/events/look') }}">イベント一覧</a>
            <a href="{{ url('/individuals/plan') }}">コミュニティをつくる</a>
        </div>

         <p>---------------------------------------------------------</p>
        <div class="exhibition">
            <h2>展示エリア</h2>
            <p>--------------------------------</p>
            <div class="bg-blue-500 text-white p-4">
                This is a Tailwind CSS styled element.
            </div>
            <p>--------------------------------</p>
            <div class="communities">
                <h3>コミュニティ</h3>
                
                @foreach ($communities as $community)
                    <!--ルートパラメータを利用する、univNameであり、代入している値は$base->univ　-->
                    <a href="{{ route('communities.show' , ['category' => $community->category]) }}">
                        {{ $community->category }}
                    </a>
                @endforeach
                
                <h1>{{ $community->category }}</h1>
            
            </div>
            <p>--------------------------------</p>
            <div class="events">
                <h3>イベント</h3>
                <h4>募集中のイベント</h4>
                <h4>過去のイベント</h4>
            </div>
        </div>
    </body>
</html>