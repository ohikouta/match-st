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
        <h1>Planning Page</h1>
        <h2>企画書の作成</h2>
        <form method="POST" action='/events'>
            @csrf
            
            <h3>企画タイトル</h3>
            <input type="text" id="title" name=event[name] required>
            <h3>企画概要</h3>
            <input type="text" id="summary" name=event[summary] required>
            <h3>募集要項</h3>
            <h3>掲示期間</h3>
            <button type="submit">登録</button>
        </form>
    </body>
</html>