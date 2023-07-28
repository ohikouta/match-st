<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Create User Information</h1>
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <!-- ユーザーがデータを入力するためのフォームを記述します -->
            <!-- 名前、大学名 -->
            <input type="text" name="name" placeholder="名前">
            <input type="text" name="univ" placeholder="大学名">
            <button type="submit">登録</button>
        </form>
        
    </body>
</html>