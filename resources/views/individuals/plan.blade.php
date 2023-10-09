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
                <h1 class="text-4xl font-bold">IEEE ～仲間をつくる～</h1>
                <!-- /users/create へのリンクを絶対URLで生成 -->
            </div>
            <!-- ナビゲーションセクション -->
            <div class="bg-blue-500 p-4 flex justify-between">
                <div>
                    <a href="{{ url('/individuals/plan') }}" class="font-bold text-white">コミュニティをつくる</a>
                    <a href="{{ url('/events/index') }}" class="font-bold text-white">イベントを企画する</a>
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
        <main class="flex justify-center">
            <div class="m-10 p-10 w-3/4 flex flex-col items-center bg-gray-200 border border-solid shadow-mg rounded-lg">
                <h1 class="text-4xl font-bold ">コミュニティ作成ページ</h1>
                <form method="POST" action="{{ route('individuals.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="image" class="block">コミュニティ画像</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                    </div>
                    
                    <div class="form-group">
                        <label for="title" class="block">コミュニティ名</label>
                        <input type="text" name="individual[title]" id="title" class="form-control" required>
                    </div>
            
                    <div class="form-group">
                        <label for="summary" class="block">コミュニティ概要</label>
                        <textarea name="individual[summary]" id="summary" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="category" class="block">カテゴリー</label>
                        <select id="category" name=individual[category] required>
                            <option value="qualification">資格</option>
                            <option value="product">製品</option>
                            <option value="topic">話題</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="admin_id" class="block">管理者ID</label>
                        <input type="text" id="admin_id" name=individual[admin_id] required>
                    </div>
            
            
                    <button type="submit" class="btn btn-primary">登録</button>
                </form>
            </div>
        </main>
        
        
        <!-- フッター -->
        <footer class="fixed bottom-0 left-0 right-0 flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>