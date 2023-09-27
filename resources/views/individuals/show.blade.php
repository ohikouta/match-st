<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <script src="https://kit.fontawesome.com/48447305da.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="w-full h-64 flex items-center justify-center overflow-hidden bg-gradient-to-b from-blue-100 to-blue-500">
            <img src='{{ asset($individual->image) }}' class="object-center object-cover h-full">
        </div>
        <div class="flex justify-center">
            <div class="w-4/5 flex flex-col items-center border border-solid border-gray-300 shadow-md mt-10">
                <h1 class="border-l-4 border-blue-500 pl-4 font-bold text-4xl mt-10">{{ $individual->title }}</h1>
                <p>{{ $individual->summary }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>