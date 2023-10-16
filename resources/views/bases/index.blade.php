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
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header class="w-screen">
            <div class="bg-blue-500 text-white p-4">
                <a href="{{ route('users.index') }}" class="block text-4xl font-bold">IEEE ～仲間をつくる～</a>
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
        <!-- メインコンテンツ -->
        <main class="">
            <div class="sm:flex-col md:flex-col lg:justify-center flex items-center">
                <div "sm:flex-col md:flex-col lg:justify-between flex">
                    <!-- コミュニティとイベント: 中央セクション -->
                    <div class="sm:order-2 md:order-2 lg:order-1 flex flex-col flex-6 mx-4 mx-auto max-w-screen-md">
                        <!-- コミュニティセクション -->
                        <div class="border border-solid border-gray-300 shadow-md mt-5 rounded-lg">
                            <h3 class="sm:text-lg py-10 lg:py-20 text-4xl text-white font-bold flex justify-center" style="background-image: url('{{ asset("storage/pic_fix/community_show.jpg") }}'); background-position: center center;">
                                コミュニティ
                            </h3>
                            <div class="p-5">
                                <div class="mt-4">
                                    <h4 class="text-xl font-bold border-l-4 border-blue-500 pl-4">資格</h4>
                                    <div class="flex p-4 pl-30 overflow-x-auto">
                                        @foreach ($qualificationData as $qualification)
                                            <a href="{{ route('individuals.show', ['individual' => $qualification->id]) }}">
                                                <div class="flex flex-col text-center w-48 mx-4 border border-gray-500 shadow-md">
                                                    <img src='{{ asset($qualification->image) }}' class="h-48 w-48">
                                                    <div class="bg-black text-white bg-opacity-50 h-20">
                                                        <h5 class="text-lg font-bold">{{ $qualification->title }}</h5>
                                                        <p class="text-sm">{{ $qualification->summary }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    
                                </div>
                                <div class="mt-4">
                                    <h4 class="text-xl font-bold  border-l-4 border-blue-500 pl-4">製品</h4>
                                    <div class="flex my-4 overflow-x-auto">
                                        @foreach ($productData as $product)
                                            <a href="{{ route('individuals.show', ['individual' => $product->id]) }}">
                                                <div class="flex flex-col text-center w-48 mx-4 border border-gray-500 shadow-md">
                                                    <img src='{{ asset($product->image) }}' class="h-48 w-48">
                                                    <div class="bg-black text-white bg-opacity-50 h-20">
                                                        <h5 class="text-lg font-bold">{{ $product->title }}</h5>
                                                        <p class="text-sm">{{ $product->summary }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4 class="text-xl font-bold border-l-4 border-blue-500 pl-4">話題</h4>
                                    <div class="flex my-4 overflow-x-auto">
                                        @foreach ($topicData as $topic)
                                            <a href="{{ route('individuals.show', ['individual' => $topic->id]) }}">
                                                <div class="flex flex-col text-center w-48 mx-4 border border-gray-500 shadow-md">
                                                    <img src='{{ asset($topic->image) }}' class="h-48 w-48">
                                                    <div class="bg-black text-white bg-opacity-50 h-20">
                                                        <h5 class="text-lg font-bold">{{ $topic->title }}</h5>
                                                        <p class="text-sm">{{ $topic->summary }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        <!-- イベントレイアウト -->
                        </div>
                        <!-- イベントセクション -->
                        <div class="border border-solid border-gray-300 shadow-md mt-5 mb-5 rounded-lg w-full">
                            <h3 class="py-20 text-4xl text-white font-bold bg-yellow-200 flex justify-center" style="background-image: url('{{ asset("storage/pic_fix/event_show.jpg") }}'); background-position: center center;">
                                イベント
                            </h3>
                            <div class="p-5">
                                <div class="flex flex-col items-center">
                                    <h4 class="text-xl font-bold p-6">募集中のイベント</h4>
                                    <!-- デスクトップレイアウト -->
                                    <!-- デスクトップレイアウトヘッダー -->
                                    <div class="w-full flex justify-between items-center bg-blue-500 text-white font-bold p-2">
                                        <div class="sm:hidden md:block lg:block w-1/4 mr-6 text-center text-sm">イベント名</div>
                                        <div class="sm:hidden md:block lg:block w-1/6 mr-6 text-center text-sm">開催日</div>
                                        <div class="sm:hidden md:block lg:block w-5/12 mr-6 text-center text-sm">概要</div>
                                        <div class="sm:hidden md:block lg:block w-1/12 mr-6 text-center text-sm">定員</div>
                                        <div class="sm:hidden md:block lg:block w-1/12 mr-6 text-center text-sm">リンク</div>
                                    </div>
                                    
                                    <!-- デスクトップレイアウトボディ -->
                                    @foreach ($futureEvent as $event)
                                    <div class="w-full flex justify-between items-center border-b p-2">
                                        <div class="sm:hidden md:block lg:block w-1/4 mr-6 text-sm">{{ $event->name }}</div>
                                        <div class="sm:hidden md:block lg:block w-1/6 mr-6 text-center text-sm">{{ $event->event_date }}</div>
                                        <div class="sm:hidden md:block lg:block w-5/12 mr-6 text-sm">{{ $event->summary }}</div>
                                        <div class="sm:hidden md:block lg:block w-1/12 mr-6 text-center">
                                            @if ($event->numberOfApplicants >= $event->max_participants)
                                                <span class="sm:hidden md:block lg:block text-red-500 font-bold">締切</span>
                                            @else
                                                <span class="sm:hidden md:block lg:block text-blue-500">{{ $event->numberOfApplicants }}/{{ $event->max_participants }}</span>
                                            @endif
                                        </div>
                                        <div class="sm:hidden md:block lg:block w-1/12 mr-6 text-center">
                                            <a href="{{ route('events.showdt', ['eventid' => $event->id]) }}" class="px-3 py-1 text-blue-500 font-bold hover:text-blue-600">-></a>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <!-- スマートフォンレイアウト -->
                                    @foreach ($futureEvent as $event)
                                    <div class="sm:block md:hidden lg:hidden mx-auto max-w-screen-md">
                                        <!-- 1行目 -->
                                        
                                        <div class="sm:inline-block md:hidden lg:hidden text-sm">{{ $event->event_date }}</div>
                                        <div class="sm:inline-block md:hidden lg:hidden text-sm">
                                            @if ($event->numberOfApplicants >= $event->max_participants)
                                                <span class="sm:inline-block md:hidden lg:hidden text-red-500 font-bold">締切</span>
                                            @else
                                                <span class="sm:inline-block md:hidden lg:hidden text-blue-500">{{ $event->numberOfApplicants }}/{{ $event->max_participants }}</span>
                                            @endif
                                        </div>
                                        <div class="sm:inline-block md:hidden lg:hidden">
                                            <a href="{{ route('events.showdt', ['eventid' => $event->id]) }}" class="px-3 py-1 text-blue-500 font-bold hover:text-blue-600">-></a>
                                        </div>
                                        
                                        <!-- 2行目 -->
                                        <div class="sm:block md:hidden lg:hidden text-sm">{{ $event->name }}</div>
                                        <div class="sm:block md:hidden lg:hidden text-sm">{{ $event->summary }}</div>
                                    </div>
                                    @endforeach
                                    
                                   
                                </div>

                                <div class="flex flex-col items-center">
                                    <h4 class="text-xl font-bold flex justify-center p-6">過去のイベント</h4>
                                    <table class="border-collapse border-b w-full table-auto">
                                        <thead class="">
                                            <tr class="">
                                                <th class="border-b-4 border-blue-500 p-2">イベント名</th>
                                                <th class="border-b-4 border-blue-500 p-2 text-center">開催日</th>
                                                <th class="border-b-4 border-blue-500 p-2 text-center">概要</th>
                                                <th class="border-b-4 border-blue-500 p-2">リンク</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($pastEvent as $event)
                                            <tr class="">
                                                <td class="font-bold border-b p-4">{{ $event->name }}</td>
                                                <td class="border-b p-4 text-center">{{ $event->event_date }}</td>
                                                <td class="border-b p-4">{{ $event->summary }}</td>
                                                <td class="border-b p-4 text-center"><a href="{{ route('events.showdt', ['eventid' => $event->id]) }}" class="bg-blue-500 px-4 py-2 text-white font-bold rounded-md hover:bg-blue-600">詳細</a></td>
                                            </tr>
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 個人プロフィールセクション -->
                    <div class="sm:order-1 md:order-1 lg:order-2 flex-4 p-4">
                        <div class="sm:flex-col md:flex justify-between lg:flex-col xl:flex-col border border-solid border-gray-300 shadow-md p-5 rounded-lg">
                            <div class="m-3">
                                <img src="{{ asset( $userData->image ) }}" class="md:h-[140px] w-[140px] lg:h-[140px] lg:w-[140px] xl:h-[210px] xl:w-[210px] mx-auto my-auto rounded-full overflow-hidden">
                                <h4 class="font-bold text-xl text-center mt-6">{{ $userData->name }}</h4>
                                <a href="{{ url('/users/profile') }}" class="btn btn-primary flex justify-center">
                                    <i class="fas fa-edit"></i>プロフィール編集
                                </a>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg border-l-4 border-blue-500 pl-2">管理コミュニティ</h3>
                                @foreach ($adminIndividuals as $individual)
                                    <a href="{{ route('individuals.show', ['individual' => $individual->id]) }}" class="block px-2 hover:text-gray-500">
                                        <i class="fas fa-key"></i><span class="ml-1">{{ $individual->title }}</span>
                                    </a>
                                
                                @endforeach
                                
                                <h3 class="font-bold text-lg border-l-4 border-blue-500 pl-2 mt-2">所属コミュニティ</h3>
                                @foreach ($userCommunities as $community)
                                    <a href="{{ route('individuals.show', ['individual' => $community->id]) }}" class="block px-2 hover:text-gray-500">
                                        {{ $community->title }}
                                    </a>
                                @endforeach
                                <h3 class="font-bold text-lg border-l-4 border-blue-500 pl-2 mt-2">参加予定のイベント</h3>
                                @foreach ($userEvents as $events)
                                    <a href="" class="block px-2 hover:text-gray-500">
                                        {{ $events->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- フッター -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>