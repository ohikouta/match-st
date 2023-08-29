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
        <form action="/users" method="post">
            @csrf
            <!-- ユーザーがデータを入力するためのフォームを記述します -->
            <!-- 名前、大学名 -->
            <input type="text" name=base[name] placeholder="名前">
            <input type="text" name=univ[univ_name] placeholder="大学名">
            <input type="text" name=univ[locate] placeholder="大学都道府県">
            <button type="submit">登録</button>
        </form>
        
    </body>
</html>