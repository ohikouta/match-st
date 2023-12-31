<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <h1>Student Information</h1>
        <p>---------------------------------------------------------</p>
        <div class='self'>
            @foreach ($bases as $base)
                <h2>{{ $base->name }}</h2>
                <a href="{{ route('univ.show' , ['univName' => $base->univ]) }}">
                    {{ $base->univ }}
                </a>
            @endforeach
        </div>
        <!-- /users/create へのリンクを絶対URLで生成 -->
        <a href="{{ url('/users/create') }}">新規ユーザー登録</a>
        <a href="{{ url('/events/index') }}">イベント</a>
        <!--<div class='paginate'>{{ $bases->links() }}</div>-->
        <!--<p>---------------------------------------------------------</p>-->
        <!--<div class="exhibition">-->
        <!--    <h2>展示エリア</h2>-->
        <!--    <p>--------------------------------</p>-->
        <!--    <div class="communities">-->
        <!--        <h3>コミュニティ</h3>-->
        <!--        <p>資格畑</p>-->
        <!--        <p>プロダクト工房</p>-->
        <!--        <p>トピック畑</p>-->
        <!--    </div>-->
        <!--    <p>--------------------------------</p>-->
        <!--    <div class="events">-->
        <!--        <h3>イベント</h3>-->
        <!--        <h4>募集中のイベント</h4>-->
        <!--        <h4>過去のイベント</h4>-->
        <!--    </div>-->
        <!--</div>-->
    </body>
</html>