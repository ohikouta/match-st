<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">{{ $university->univ_name }}</h1>
        <div class="content">
            
            <p>{{ $university->locate }}</p>
            
        </div>
        <!--<div class="edit">-->
            
        <!--</div>-->
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>