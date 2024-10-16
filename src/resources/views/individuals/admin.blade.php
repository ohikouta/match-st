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
            <a href="{{ route('users.index') }}" class="block text-4xl font-bold">IEEE ～仲間をつくる～</a>
        </div>
        <!-- ナビゲーションセクション -->
        <div class="bg-blue-500 p-4">
            <!--<a href="{{ url('/users/profile') }}" class="font-bold text-white">プロフィール編集</a>-->
            <a href="{{ url('/events/index') }}" class="font-bold text-white">イベントを企画する</a>
            <a href="{{ url('/individuals/plan') }}" class="font-bold text-white">コミュニティをつくる</a>
        </div>
        <!-- ページ上部イメージ -->
        <div class="w-full h-64 overflow-hidden">
            <img src='{{ asset($adminImage->url) }}' class="object-center object-cover w-full h-full">
        </div>
        
        <div class="flex flex-col justify-center items-center p-10">
            <!-- メインコンテンツ -->
            <div class="container flex flex-col items-center border border-solid rounded-lg shadow-md">
                <form action="{{ route('individuals.update', ['id' => $individual->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="block font-bold text-xl border-l-4 border-blue-500 pl-2 mt-5 mb-3">タイトル</label>
                        <input type="text" name="title" id="title" class="block form-control w-full" value="{{ $individual->title }}" required>
                    </div>
            
                    <div class="form-group">
                        <label for="summary" class="block font-bold text-xl border-l-4 border-blue-500 pl-2 mt-5 mb-3">概要</label>
                        <textarea name="summary" id="summary" class="block form-control w-full" required>{{ $individual->summary }}</textarea>
                    </div>
            
                    <div class="form-group">
                        <label for="image" class="block font-bold text-xl border-l-4 border-blue-500 pl-2 mt-5 mb-3">画像</label>
                        <input type="file" name="image" id="image" class="block form-control-file">
                    </div>
                    
                    <div class="flex justify-center">
                        <button type="submit" class="my-5 block btn btn-primary font-bold text-white bg-green-500 py-2 px-10 rounded-md hover:bg-green-600">更新</button>
                    </div>
                </form>
            </div>
            
            
            <div class="flex flex-col items-center w-3/4 p-8 border border-solid shadow-md rounded-lg mt-5">
                <h1 class="border-l-4 border-blue-500 pl-2 text-xl font-bold mb-4">参加リクエスト一覧</h1>
                
                @if ($requests->count() === 0)
                    <p class="font-bold text-center text-xl">現在、参加リクエストはありません</p>
                @else
                    <table class="w-3/4 table-auto border-collapse">
                    <thead>
                        <tr class="">
                            <th class="py-2 px-4 font-bold text-left text-lg text-center border-b-4 border-blue-500">名前</th>
                            <th class="py-2 px-4 font-bold text-left text-lg text-center border-b-4 border-blue-500">大学</th>
                            <th class="py-2 px-4 font-bold text-left text-lg text-center border-b-4 border-blue-500">学年</th>
                            <th class="py-2 px-4 font-bold text-lg border-b-4 border-blue-500 text-center">許可</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="py-1 px-4 border">{{ $request->user->name }}</td>
                                <td class="py-1 px-4 border">{{ $request->user->univ }}</td>
                                <td class="py-1 px-4 border">{{ $request->user->grade }}</td>
                                
                                <td class="py-1 px-4 border">
                                    <!-- 許可ボタンのフォーム -->
                                    <form method="POST" action="{{ route('allow-Membership') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $request->user_id }}">
                                        <input type="hidden" name="individual_id" value="{{ $request->individuals_id }}">
                                        <button class="bg-green-500 text-white px-2 py-1 rounded-lg hover:bg-green-600"
                                            id="allowMembershipButton" onclick="allowMembership(event, {{ $request->id }})" data-request-id="{{ $request->id }}">許可</button>
                                        <div id="message"></div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                @endif
                
            </div>
        </div>
        <!-- ナビゲーションセクション -->
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>