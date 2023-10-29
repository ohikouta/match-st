<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Student Information</title>
        <!-- Fonts -->
        <link href="https://googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://kit.fontawesome.com/48447305da.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            <div class="bg-blue-500 text-white p-4">
                <a href="{{ route('users.index') }}" class="sm:text-2xl md:text-4xl block font-bold">IEEE ～仲間をつくる～</a>
            </div>
            <!-- ナビゲーションセクション -->
            <div class="bg-blue-500 p-4 flex justify-between">
                <div>
                    <a href="{{ url('/individuals/plan') }}" class="font-bold text-white">コミュニティをつくる</a>
                    <a href="{{ route('events.plan') }}" class="font-bold text-white">イベントを企画する</a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <!-- ログアウトボタン -->
                    <button type="submit" class="underline text-sm text-gray-600 bg-green-300 p-2 rounded-lg hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-sign-out-alt"></i>{{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </header>
        <div class="w-full h-64 overflow-hidden">
            <img src='{{ asset($planImage->url) }}' class="object-center object-cover w-full h-full">
        </div>
        <main class="flex justify-center">
            <div class="m-12 p-10 w-3/4 flex flex-col items-center bg-gray-200 border border-solid shadow-mg rounded-lg">
                <h1 class="text-4xl font-bold border-l-4 border-blue-500 pl-4">コミュニティ作成ページ</h1>
                <form method="POST" action="{{ route('individuals.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group mt-5">
                        <label for="image" class="block text-lg font-bold">コミュニティ画像</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                    </div>
                    
                    <div class="form-group mt-5">
                        <label for="title" class="block text-lg font-bold">コミュニティ名</label>
                        <input type="text" name="title" id="title" class="form-control w-full" required>
                    </div>
            
                    <div class="form-group mt-5">
                        <label for="summary" class="block text-lg font-bold">コミュニティ概要</label>
                        <textarea name="summary" id="summary" class="form-control w-full"></textarea>
                    </div>
                    
                    <div class="form-group mt-5">
                        <label for="category" class="block text-lg font-bold">カテゴリー</label>
                        <select id="category" name="category" required>
                            <option value="qualification">資格</option>
                            <option value="product">製品</option>
                            <option value="topic">話題</option>
                        </select>
                    </div>
                    
                    <div class="form-group mt-5">
                        <label for="admin_id" class="block text-lg font-bold">管理者ID</label>
                        <p>自身のIDを入力してください</p>
                        <input type="text" id="admin_id" name="admin_id" required>
                    </div>
            
            
                    <button type="submit" class="mt-6 btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">登録</button>
                </form>
            </div>
        </main>
        
        
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>