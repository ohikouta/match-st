<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script type="module" src="{{ asset('js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://kit.fontawesome.com/48447305da.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
            @csrf
                    
            <div class="">
                <label for="image" class="block text-lg font-bold">test画像</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="">
                <label for="alt_text" class="block text-lg font-bold">alt_text</label>
                <input type="text" name="alt_text" id="alt_text" class="form-control-file">
            </div>
            <button type="submit" class="mt-6 btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">登録</button>
        </form>
    </body>
</html>