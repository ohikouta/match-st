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
        <div class="w-full h-64 flex items-center justify-center overflow-hidden bg-gradient-to-b from-blue-100 to-blue-500">
            <img src='{{ asset($individual->image) }}' class="object-center object-cover h-full">
        </div>
        <!-- メインコンテンツ -->
        <div class="flex justify-center items-center">
            <div class="w-3/4 flex flex-col border border-solid border-gray-300 shadow-md mt-10 mb-10 p-10">
                <h1 class="border-l-4 border-blue-500 pl-4 font-bold text-4xl mt-3">{{ $individual->title }}</h1>
                <p class="text-lg font-bold m-3">{{ $individual->summary }}</p>
                <h2 class="text-xl font-bold border-l-4 border-blue-500 pl-4 mt-3">管理者</h2>
                <p class="text-lg font-bold m-3">{{ $individual->user->name }}</p>
                <!-- タイムライン一覧 -->
                @if ($individual->posts->count() > 0)
                <div class="flex justify-center">
                    <div class="w-3/4 items-center bg-gray-100 border border-gray-300 shadow-md p-4">
                        <h2 class="font-bold text-xl border-l-4 border-blue-500 pl-4">投稿一覧</h2>
                        <ul class="space-y-4 mt-6">
                            @foreach ($individual->posts as $post)
                                <li class="bg-white p4 shadow-md rounded-lg p-4 mb-4">
                                    <div class="flex">
                                        <p class="text-gray-800">投稿日時: {{ $post->created_at }}</p>
                                        <p class="text-gray-800">投稿者: {{ $post->user->name }}</p>
                                    </div>
                                    <p class="text-gray-800 p-2">{{ $post->content }}</p>
                                    <!-- Replyボタン -->
                                    <button class="text-blue-500" id="reply-button">Reply</button>
                                    <!-- コメント表示（非表示）-->
                                    <div id="comment-list" class="hidden">
                                        <p>返信一覧</p>
                                        <!-- コメント一覧を表示（非表示） -->
                                        @foreach ($post->comments as $comment)
                                            <p>{{ $comment->content }}</p>
                                        @endforeach
                                    </div>
                                    <!-- コメントフォーム（非表示） -->
                                    <div id="comment-form" class="hidden">
                                        <form method="POST" action="/comment">
                                            @csrf
                                            <textarea name="comment_content" class="w-full" rows="1" placeholder="コメントを入力"></textarea>
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <button type="submit" class="btn btn primary mt-2">送信</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                            <!-- JS -->
                            <script>
                            document.querySelectorAll('#reply-button').forEach(function(button) {
                                button.addEventListener('click', function() {
                                    // 対応するコメントフォームとコメント表示を切り替え
                                    const commentForm = this.nextElementSibling.nextElementSibling;
                                    const commentList = commentForm.nextElementSibling;
                            
                                    commentForm.classList.toggle('hidden');
                                    commentList.classList.toggle('hidden');
                                });
                            });
                            </script>
                        </ul>
                    </div>
                </div>
                @else
                    <div class="border border-gray-300 shadow-md p-3 text-center">
                        <p class="font-bold">投稿はありません</p>
                    </div>
                @endif
                <!-- 投稿フォーム -->
                <form method="POST" action="/timeline">
                    @csrf
                    <div class="form-group mt-3">
                        <textarea name="content" class="form-control w-full" rows="3" placeholder="投稿内容を入力"></textarea>
                    </div>
                    <input type="hidden" name="individual_id" value="{{ $individual->id }}">
                    <button type="submit" class="btn btn-primary mt-3">投稿する</button>
                </form>
               
            </div>
        </div>
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10 sticky bottom-0">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>