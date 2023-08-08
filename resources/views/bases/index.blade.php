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
        <div class='paginate'>{{ $bases->links('pagination::bootstrap-4') }}</div>
    </body>
</html>