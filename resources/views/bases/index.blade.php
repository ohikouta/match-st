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
                <a href="{{ route('users.index') }}" class="sm:text-2xl md:text-4xl block font-bold">IEEE ～仲間をつくる～</a>
            </div>
            
            <!-- ナビゲーションセクション -->
            <div class="bg-blue-500 p-4 flex justify-between">
                <div>
                    <a href="{{ url('/individuals/plan') }}" class="sm:text-sm md:text-base font-bold text-white">コミュニティをつくる</a>
                    <a href="{{ route('events.plan') }}" class="sm:text-sm md:text-base font-bold text-white">イベントを企画する</a>
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
            <div>
                <a href="{{ route('images.show') }}">アプリ画像登録</a>
            </div>
            <div class="">
                <div class="sm:flex sm:flex-col sm:bg-red-500 md:flex md:flex-col md:bg-blue-500 lg:w-5/6 lg:flex lg:flex-row lg:justify-between lg:bg-green-500 xl:flex xl:w-4/5 xl:flex-row xl:justify-between xl:bg-yellow-500 mx-auto">
                    <!-- コミュニティとイベント: 中央セクション -->
                    <div class="sm:order-2 md:order-2 lg:order-1 lg:flex-6 lg:w-3/5 mx-4">
                        <div class="flex flex-col">
                            <!-- コミュニティセクション -->
                            <div class="border border-solid border-gray-300 shadow-md mt-5 rounded-lg">
                                <h3 class="sm:text-lg py-10 lg:py-20 text-4xl text-white font-bold flex justify-center" style="background-image: url('{{ asset($individualImage->url) }}'); background-position: center center;">
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
                                <h3 class="sm:text-lg py-10 lg:py-20 text-4xl text-white font-bold bg-yellow-200 flex justify-center" style="background-image: url('{{ asset($eventImage->url) }}'); background-position: center center;">
                                    イベント
                                </h3>
                                <div class="p-5">
                                    
                                    <!-- 募集中のイベントセクション -->
                                    <div class="flex flex-col items-center">
                                        <h4 class="text-xl font-bold p-6">募集中のイベント</h4>
                                        <!-- デスクトップレイアウト -->
                                        <!-- デスクトップレイアウトヘッダー -->
                                        <div class="invisible md:visible lg:visible xl:visible w-full">
                                            <div class="hidden md:block md:w-full md:flex md:justify-between md:items-center bg-blue-500 text-white font-bold p-2">
                                                <div class="w-1/4 mr-6 text-center text-sm">イベント名</div>
                                                <div class="w-1/6 mr-6 text-center text-sm">開催日</div>
                                                <div class="w-5/12 mr-6 text-center text-sm">概要</div>
                                                <div class="w-1/12 mr-6 text-center text-sm">定員</div>
                                                <div class="w-1/12 mr-6 text-center text-sm">リンク</div>
                                            </div>
                                            
                                        </div>
                                        
                                        <!-- テストサンプルコード -->
                                        <!-- 以下のdiv要素をsm:非表示、md,lg,xl:表示に設定する -->
                                        <div class="invisible md:visible">
                                            <div class="hidden md:block">
                                                <p>サンプルテキスト</p>
                                            </div>
                                            
                                        </div>
                                        
                                        <!-- デスクトップレイアウトボディ -->
                                        <div class="invisible md:visible lg:visible xl:visible">
                                            @foreach ($futureEvent as $event)
                                            <div class="hidden md:block md:w-full md:flex md:justify-between md:items-center border-b p-2">
                                                <div class="w-1/4 mr-6 text-sm">{{ $event->name }}</div>
                                                <div class="w-1/6 mr-6 text-center text-sm">{{ $event->event_date }}</div>
                                                <div class="w-5/12 mr-6 text-sm">{{ $event->summary }}</div>
                                                <div class="w-1/12 mr-6 text-center">
                                                    @if ($event->numberOfApplicants >= $event->max_participants)
                                                        <span class="text-red-500 font-bold">締切</span>
                                                    @else
                                                        <span class="text-blue-500">{{ $event->numberOfApplicants }}/{{ $event->max_participants }}</span>
                                                    @endif
                                                </div>
                                                <div class="w-1/12 mr-6 text-center">
                                                    <a href="{{ route('events.showdt', ['eventid' => $event->id]) }}" class="px-3 py-1 text-blue-500 font-bold hover:text-blue-600">-></a>
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                        
                                        <!-- スマートフォンレイアウト -->
                                        <div class="visible md:invisible">
                                            @foreach ($futureEvent as $event)
                                            <div class="sm:block md:hidden mx-auto max-w-screen-md border-b p-2">
                                                <!-- 1行目 -->
                                                <div class="sm:inline-block md:hidden lg:hidden text-sm">開催日:{{ $event->event_date }}</div>
                                                <div class="sm:inline-block md:hidden lg:hidden text-sm">
                                                    @if ($event->numberOfApplicants >= $event->max_participants)
                                                        <span class="sm:inline-block md:hidden lg:hidden text-red-500 font-bold">募集:締切</span>
                                                    @else
                                                        <span class="sm:inline-block md:hidden lg:hidden text-blue-500">募集:{{ $event->numberOfApplicants }}/{{ $event->max_participants }}</span>
                                                    @endif
                                                </div>
                                                <div class="sm:inline-block md:hidden lg:hidden">
                                                    <a href="{{ route('events.showdt', ['eventid' => $event->id]) }}" class="px-3 py-1 text-blue-500 font-bold hover:text-blue-600">-></a>
                                                </div>
                                                
                                                <!-- 2行目 -->
                                                <div class="sm:block md:hidden lg:hidden text-sm font-bold">{{ $event->name }}</div>
                                                <div class="sm:block md:hidden lg:hidden text-sm">{{ $event->summary }}</div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <!-- 過去のイベントセクション -->
                                    <div class="flex flex-col items-center">
                                        <h4 class="text-xl font-bold flex justify-center p-6">過去のイベント</h4>
                                        
                                        <!-- デスクトップレイアウト -->
                                        <!-- デスクトップレイアウトヘッダー -->
                                        <div class="invisible md:visible lg:visible xl:visible w-full">
                                            <div class="hidden md:block md:w-full md:flex md:justify-between md:items-center bg-blue-500 text-white font-bold p-2">
                                                <div class="w-1/4 mr-6 text-center text-sm">イベント名</div>
                                                <div class="w-1/6 mr-6 text-center text-sm">開催日</div>
                                                <div class="w-5/12 mr-6 text-center text-sm">概要</div>
                                                <div class="w-1/12 mr-6 text-center text-sm">リンク</div>
                                            </div>
                                        </div>
                                        
                                        <!-- デスクトップレイアウトボディ -->
                                        <div class="invisible md:visible lg:visible xl:visible w-full">
                                            @foreach ($pastEvent as $event)
                                            <div class="hidden md:block md:w-full md:flex md:justify-between md:items-center border-b p-2">
                                                <div class="w-1/4 mr-6 text-sm">{{ $event->name }}</div>
                                                <div class="w-1/6 mr-6 text-center text-sm">{{ $event->event_date }}</div>
                                                <div class="w-5/12 mr-6 text-sm">{{ $event->summary }}</div>
                                                <div class="w-1/12 mr-6 text-center">
                                                    <a href="{{ route('events.showdt', ['eventid' => $event->id]) }}" class="px-3 py-1 text-blue-500 font-bold hover:text-blue-600">-></a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        
                                        <!-- スマートフォンレイアウト -->
                                        <div class="visible md:invisible w-full">
                                            @foreach ($pastEvent as $event)
                                            <div class="sm:block md:hidden mx-auto max-w-screen-md border-b p-2">
                                                <!-- 1行目 -->
                                                <div class="sm:inline-block md:hidden lg:hidden text-sm">開催日:{{ $event->event_date }}</div>
                                                <div class="sm:inline-block md:hidden lg:hidden">
                                                    <a href="{{ route('events.showdt', ['eventid' => $event->id]) }}" class="px-3 py-1 text-blue-500 font-bold hover:text-blue-600">-></a>
                                                </div>
                                                
                                                <!-- 2行目 -->
                                                <div class="sm:block md:hidden lg:hidden text-sm font-bold">{{ $event->name }}</div>
                                                <div class="sm:block md:hidden lg:hidden text-sm">{{ $event->summary }}</div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 個人プロフィールセクション -->
                    <div class="sm:order-1 md:order-1 lg:order-2 lg:flex-4 lg:w-2/5 p-4">
                        <div class="sm:flex sm:flex-col md:flex md:flex-row md:justify-between lg:flex lg:flex-col xl:flex xl:flex-col border border-solid border-gray-300 shadow-md p-5 rounded-lg">
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
            <h1 class="sm:text-2xl md:text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="sm:text-xl md:text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>