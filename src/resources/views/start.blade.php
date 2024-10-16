<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Fonts -->
    </head>
    <body class="">
        <header class="w-full">
            <div class="bg-blue-500 text-white p-4">
                <h1 class="text-4xl font-bold">IEEE ～仲間をつくる～</h1>
                <div class="link flex justify-end">
                    <a href="{{ url('/users/index') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md mr-4 transition duration-300 ease-in-out">ログイン</a>
                    <a href="{{ url('/register') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md mr-4 transition duration-300 ease-in-out">新規登録</a>
                </div>
            </div>
        </header>
        <main class="flex flex-col items-center">
            <div class="border border-blue-300 border-solid border-4 shadow-md rounded-md p-5 m-5">
                <h2 class="text-4xl font-bold mb-2">IEEE</h2>
                <p>
                    世界最大の電気電子情報分野の学会。400,000人以上の会員がおり、うち107,000人以上の学生会員が所属している。
                    100以上の論文誌はじめ定期刊行物を発行、実に多数の学術会議を開いており、IEEE会員となることでそれらに多く接する機会を得ることができる。
                    <p class="font-bold">本サービスは、新たな学びへの探求を共にする「仲間をつくる」ことを目的としている。</p>
                </p>
            </div>
            <div class="w-full">
                <div class="flex flex-col">
                    <!-- コミュニティセクション -->
                    <div class="border border-gray-300 border-solid shadow-md rounded-md p-5 m-5">
                        <h2 class="text-xl font-bold text-center mb-2">コミュニティ</h2>
                        <p class="text-center">当組織には多様なコミュニティが生まれています。メンバーは興味関心に合わせて学びを深めることができます。</p>
                    </div>
                    <div class="">
                        <div class="p-5">
                            <div class="mt-4">
                                <h4 class="text-xl font-bold border-l-4 border-blue-500 pl-4">資格</h4>
                                <div class="flex p-4 pl-30 overflow-x-auto bg-blue-500">
                                    @foreach ($qualificationData as $qualification)
                                        <a>
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
                                        <a>
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
                                        <a>
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
                    </div>
                    <!-- イベントレイアウト -->
                </div>
                    <div class="border border-gray-300 border-solid shadow-md rounded-md p-5 m-5">
                        <h2 class="text-xl font-bold text-center mb-2">イベント</h2>
                        <p class="text-center">定期的にメンバー同士の交流が行われています。メンバーは自らイベントを企画・運営することができます。</p>
                    </div>
                    <!-- イベントセクション -->
                    <div class="border border-solid border-gray-300 shadow-md mt-5 mb-5 rounded-lg w-full">
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
                                
                                <!-- デスクトップレイアウトボディ -->
                                <div class="invisible md:visible lg:visible xl:visible w-full">
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
        </main>
        <!-- フッターのfixはビューごとにカスタム -->
        <footer class="flex flex-col items-center justify-center bg-blue-500 p-10">
            <h1 class="sm:text-2xl md:text-4xl font-bold text-white">IEEESB ～仲間をつくる～</h1>
            <p class="sm:text-xl md:text-lg font-bold text-white">All Rights Reserved.</p>
        </footer>
    </body>
</html>
