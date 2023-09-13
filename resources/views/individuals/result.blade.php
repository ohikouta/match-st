<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1">
        <title>Event</title>
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">以下のコミュニティが作成されました</h1>
        <div class="content">
            <h1>{{ $individual->name }}</h1>
            <h3>コミュニティ概要</h3>
            <p>{{ $individual->summary }}</p>
        </div>
        <!--<div class="edit">-->
            
        <!--</div>-->
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>