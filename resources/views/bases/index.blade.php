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
            <h1 class="text-4xl font-bold">IEEE</h1>
            <!-- /users/create へのリンクを絶対URLで生成 -->
            
        </div>
        <div class="bg-green-400 text-bold p-4">
            <a href="{{ url('/users/profile') }}">プロフィール編集</a>
            <a href="{{ url('/events/index') }}">イベントを企画する</a>
            <a href="{{ url('/events/look') }}">イベント一覧</a>
            <a href="{{ url('/individuals/plan') }}">コミュニティをつくる</a>
            
        </div>

         <p>---------------------------------------------------------</p>
        <div class="exhibition">
            <h2>展示エリア</h2>
            <div class="communities">
                <h3 class="text-2xl font-bold bg-yellow-200 p-4">コミュニティ</h3>
                <div class="flex justify-center">
                    <div>
                        <h4 class="text-xl font-bold">～資格～</h4>
                        @foreach ($qualificationData as $qualification)
                            <h5 class="text-lg font-bold">{{ $qualification->title }}</h5>
                            <p class="">{{ $qualification->summary }}</p>
                        @endforeach
                    </div>
                    <div>
                        <h4 class="text-xl font-bold">～製品～</h4>
                        @foreach ($productData as $product)
                            <h5 class="text-lg font-bold">{{ $product->title }}</h5>
                            <p class="">{{ $product->summary }}</p>
                        @endforeach
                    </div>
                    <div>
                    <h4 class="text-xl font-bold">～話題～</h4>
                    <!--ルートパラメータを利用する、univNameであり、代入している値は$base->univ　-->
                    @foreach ($topicData as $topic)
                        <h5 class="text-lg font-bold">{{ $topic->title }}</h5>
                        <p class="">{{ $topic->summary }}</p>
                    @endforeach
                    </div>
                </div>
                    
                
            
            </div>
            <p>--------------------------------</p>
            <div class="events">
                <h3 class="text-2xl font-bold bg-yellow-200 p-4">イベント</h3>
                <h4>募集中のイベント</h4>
                <h4>過去のイベント</h4>
            </div>
        </div>
    </body>
</html>