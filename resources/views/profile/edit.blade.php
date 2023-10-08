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
        <div class="bg-blue-500 text-white p-4">
            <h1 class="text-4xl font-bold">IEEE ～仲間をつくる～</h1>
            <!-- /users/create へのリンクを絶対URLで生成 -->
        </div>
        <!-- ナビゲーションセクション -->
        <div class="bg-blue-500 p-4">
            <!--<a href="{{ url('/users/profile') }}" class="font-bold text-white">プロフィール編集</a>-->
            <a href="{{ url('/events/index') }}" class="font-bold text-white">イベントを企画する</a>
            <a href="{{ url('/events/look') }}" class="font-bold text-white">イベント一覧</a>
            <a href="{{ url('/individuals/plan') }}" class="font-bold text-white">コミュニティをつくる</a>
        </div>
        <div class="w-full h-64 overflow-hidden">
            <img src='{{ asset("storage/pic_fix/bg_pic_edit_profile.jpg") }}' class="object-center object-cover w-full h-full">
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>
