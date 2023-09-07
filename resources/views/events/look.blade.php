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
        <h1>イベント掲示板</h1>
        <p>変更しました！</p>
        <div class='self'>
            @foreach ($events as $event)
                <h2>{{ $event->name }}</h2>
            @endforeach
        </div>
        <div class='paginate'>{{ $events->links('pagination::bootstrap-4') }}</div>
    </body>
</html>