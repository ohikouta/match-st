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
        <img src='{{ asset("storage/community_admin.jpg") }}' class="h-100">
        <div class="flex justify-center items-center p-10">
            <!-- メインコンテンツ -->
            <div class="flex flex-col items-center w-3/4 bg-red-500 p-8">
                <h1 class="text-xl font-bold mb-4">参加リクエスト一覧</h1>
                <table class="w-3/4 table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr class="">
                            <th class="py-2 px-4 bg-blue-200 font-bold text-left text-lg text-center border">名前</th>
                            <th class="py-2 px-4 bg-blue-200 font-bold text-left text-lg text-center border">大学</th>
                            <th class="py-2 px-4 bg-blue-200 font-bold text-left text-lg text-center border">学年</th>
                            <th class="py-2 px-4 bg-blue-200 font-bold text-lg border text-center">許可</th>
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