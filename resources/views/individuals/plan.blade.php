<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Community</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <h1>Planning Page</h1>
        <h2>コミュニティをつくる</h2>
        <form method="POST" action='/individuals'>
            @csrf
            
            <h3>コミュニティ名</h3>
            <input type="text" id="title" name=individual[title] required>
            <h3>コミュニティ概要</h3>
            <input type="text" id="summary" name=individual[summary] required>
            <h3>カテゴリー</h3>
            <select id="category" name=individual[category] required>
                <option value="qualification">資格</option>
                <option value="product">製品</option>
                <option value="topic">話題</option>
            </select>
            <h3>管理者ID</h3>
            <input type="text" id="admin_id" name=individual[admin_id] required>
            <button type="submit">登録</button>
        </form>
    </body>
</html>