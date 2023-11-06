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
            <a href="{{ url('/events/index') }}" class="font-bold text-white">イベントを企画する</a>
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
                <!-- 管理者ページへの導線: 管理者のみ表示する -->
                @if(auth()->check() && auth()->user()->id === $individual->admin_id)
                    <a href="{{ route('individuals.admin', ['id' => $individual->id]) }}" class="inline-block my-6 p-4 font-bold text-white bg-green-500 rounded-md hover:bg-green-600"><i class="fas fa-key mr-2"></i>管理者ページ</a>
                @endif
                <!-- 未参加のユーザーのみ参加リクエストボタンを表示 -->
                @if(auth()->check())
                    @php
                        $userIsMember = auth()->user()->communities->contains($individual->id);
                        $userIsAdmin = auth()->user()->id === $individual->admin_id;
                    @endphp
                
                    @if(!$userIsMember && !$userIsAdmin)
                        <form id="myform" method="POST" action="{{ route('individuals.join', ['individual' => $individual->id]) }}">
                            @csrf
                            <button id="joinRequestButton" class="mx-auto font-bold bg-green-500 text-white py-4 px-6 mb-4 rounded-lg">参加リクエスト送信</button>
                        </form>
                    @endif
                @endif

                <!-- タイムライン一覧 -->
                @if ($userIsMember || $userIsAdmin)
                    <div id="posts-information" class="flex flex-col items-center">
                        <div class="w-3/4 items-center bg-gray-100 border border-gray-300 shadow-md p-4">
                            <h2 class="font-bold text-xl border-l-4 border-blue-500 pl-4">投稿一覧</h2>
                            @if ($individual->posts->count() === 0)
                                <div id="no-posts-message" class="w-3/4 items-center bg-gray-100 border border-gray-300 shadow-md p-4">
                                    <p class="font-bold">投稿はありません</p>
                                </div>
                            @endif
                            <ul id="posts-container" class="space-y-4 mt-6">
                                @foreach ($posts as $post)
                                    <li class="bg-white p4 shadow-md rounded-lg p-4 mb-4" id="post-{{ $post->id }}">
                                        <div class="flex justify-between">
                                            <div class="flex">
                                                <p class="text-gray-800 mr-3">投稿日時: {{ $post->created_at }}</p>
                                                <p class="text-gray-800 mr-3">投稿者: {{ $post->user->name }}</p>
                                            </div>
                                            <form method="POST" action="{{ route('post.delete', ['id' => $post->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-post-button" data-postId="{{ $post->id }}"><i class="fas fa-trash block"></i></button>
                                            </form>
                                        </div>
                                        <p class="text-gray-800 p-2">{{ $post->content }}</p>
                                        <!-- Replyボタン -->
                                        
                                        <button class="text-blue-500 block flex justify-between pl-15" id="reply-button">
                                            <p class="inline ml-2">Reply</p>
                                            <i class="far fa-comment-dots ml-2"></i>
                                        </button>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <!-- コメント表示（非表示）-->
                                        <div id="comment" class="comment-section hidden">
                                            <p class="font-bold text-lg m-4">返信一覧</p>
                                            <!-- コメント一覧を表示（非表示） -->
                                            <div id="comment-list">
                                                @foreach ($post->comments as $comment)
                                                    <div id="comment-{{ $comment->id }}" class="border border-gray-300 shadow-md p-4 rounded-lg m-2">
                                                        <div class="flex">
                                                            <p class="text-gray-800 mr-3">返信日時: {{ $comment->created_at }}</p>
                                                            <p class="text-gray-800 mr-3">返信者: {{ $comment->user->name }}</p>
                                                        </div>
                                                        <i class="fas fa-trash"></i>
                                                        <p class="p-2">{{ $comment->content }}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div id="comment-form" class="">
                                                <form method="POST" action="{{ route('timeline.addComment') }}">
                                                    @csrf
                                                    <textarea name="comment_content" class="w-full" rows="1" placeholder="コメントを入力"></textarea>
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    <button id="postCommentButton" type="button" class="btn btn primary mt-2">送信</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- コメントフォーム（非表示） -->
                                    </li>
                                @endforeach
                                <!-- JS -->
                                <script>
                                document.querySelectorAll('#reply-button').forEach(function(button) {
                                    button.addEventListener('click', function() {
                                        // 対応するコメントフォームとコメント表示を切
                                        const commentSection = this.nextElementSibling;
                                
                                        commentSection.classList.toggle('hidden');
                                    });
                                });
                                </script>
                            </ul>
                        </div>
                    </div>
                    <!-- 投稿フォーム -->
                    <form id="postForm" method="POST" action="{{ route('timeline.store') }}">
                        @csrf
                        <div class="form-group mt-3">
                            <textarea id="message" name="content" class="form-control w-full" rows="3" placeholder="投稿内容を入力"></textarea>
                            <div id="mentionList"></div>
                        </div>
                        <!--  情報渡し -->
                        <input type="hidden" name="individual_id" value="{{ $individual->id }}">
                        <input type="hidden" name="user_list" value="{{ json_encode($userList) }}">
                        <button type="button" id="postFormButton" class="btn btn-primary mt-3 inline-block text-center py-4 px-8 text-white font-bold bg-green-500 rounded-md hover:bg-green-600">投稿する</button>
                    </form>
                @endif
            </div>
        </div>
       
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
        <script>
            var individualId = "{{ route('individuals.join', ['individual' => $individual->id]) }}"
        </script>
    </body>
</html>