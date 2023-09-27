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
        <div class="bg-blue-500 text-white p-4">
            <h1 class="text-4xl font-bold">IEEE</h1>
            <!-- /users/create へのリンクを絶対URLで生成 -->
        </div>
        <!-- ナビゲーションセクション -->
        <div class="bg-blue-500 p-4">
            <!--<a href="{{ url('/users/profile') }}" class="font-bold text-white">プロフィール編集</a>-->
            <a href="{{ url('/events/index') }}" class="font-bold text-white">イベントを企画する</a>
            <a href="{{ url('/events/look') }}" class="font-bold text-white">イベント一覧</a>
            <a href="{{ url('/individuals/plan') }}" class="font-bold text-white">コミュニティをつくる</a>
        </div>
        <div class="flex justify-between w-9/10 ml-10 mr-10">
            <!-- コミュニティとイベントセクション -->
            <div class="flex flex-col flex-7">
                <div class="communities">
                    <h3 class="text-2xl font-bold bg-yellow-200 p-4 flex justify-center">コミュニティ</h3>
                    <div class="">
                        <div>
                            <h4 class="text-xl font-bold text-center">～資格～</h4>
                            <div class="flex justify-center p-4">
                                @foreach ($qualificationData as $qualification)
                                    <a href="{{ route('individuals.show', ['individual' => $qualification->id]) }}">
                                        <div class="bg-cover bg-center h-48 w-48 relative flex flex-col items-center justify-center mx-4" style="background-image: url('{{ asset($qualification->image) }}')">
                                            <div class="text-white bg-blue-400 bg-opacity-90 w-full text-center rounded-md">
                                                <h5 class="text-lg font-bold">{{ $qualification->title }}</h5>
                                                <p class="text-sm">{{ $qualification->summary }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="pagination">
                                {{ $qualificationData->links() }}
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-center">～製品～</h4>
                            <div class="flex justify-center my-4">
                                @foreach ($productData as $product)
                                    <div class="flex flex-col text-center w-48 mx-4 border border-gray-500 shadow-md">
                                        <img src='{{ asset($product->image) }}' class="h-48 w-48">
                                        <div class="bg-black text-white bg-opacity-50 h-20">
                                            <h5 class="text-lg font-bold">{{ $product->title }}</h5>
                                            <p class="text-sm">{{ $product->summary }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination flex justify-center">
                                {{ $productData->links() }}
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-center">～話題～</h4>
                            <div class="flex justify-center my-4">
                                @foreach ($topicData as $topic)
                                    <div class="flex flex-col text-center w-48 mx-4 border border-gray-500 shadow-md">
                                        <img src='{{ asset($topic->image) }}' class="h-48 w-48">
                                        <div class="bg-black text-white bg-opacity-50 h-20">
                                            <h5 class="text-lg font-bold">{{ $topic->title }}</h5>
                                            <p class="text-sm">{{ $topic->summary }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination flex justify-center">
                                {{ $topicData->links() }}
                            </div>
                        </div>
                    </div>
                <!-- イベントレイアウト -->
                </div>
                <div class="events">
                    <h3 class="text-2xl font-bold bg-yellow-200 p-4 mx-auto">イベント</h3>
                    <div class="">
                        <h4 class="text-xl font-bold flex justify-center p-6">募集中のイベント</h4>
                        <table class="border-collapse border-b">
                            <thead class="">
                                <tr>
                                    <th class="border-b-4 border-blue-500 p-2">イベント名</th>
                                    <th class="border-b-4 border-blue-500 p-2">開催日</th>
                                    <th class="border-b-4 border-blue-500 p-2">概要</th>
                                    <th class="border-b-4 border-blue-500 p-2">ステータス</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($futureEvent as $event)
                            <tr class="">
                                <td class="font-bold border-b p-4">{{ $event->name }}</td>
                                <td class="border-b p-4">{{ $event->event_date }}</td>
                                <td class="border-b p-4">{{ $event->summary }}</td>
                                <td class="border-b p-4">募集中</td>
                            </tr>
                            @endforeach
                                
                            </tbody>
                        </table>
                        
                        <h4 class="text-xl font-bold flex justify-center p-6">過去のイベント</h4>
                        @foreach ($pastEvent as $event)
                            <h5 class="text-lg font-bold">{{ $event->name }}</h5>
                            <p class="">{{ $event->summary }}</p>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <!-- 個人プロフィールセクション -->
            <div class="flex-3 ml-20 mt-5 border border border-solid border-gray-300 shadow-md">
                <div class="m-3">
                    <img src="{{ asset( $userData->image ) }}" class="rounded-full overflow-hidden h-[210px] w-[210px] mx-auto my-auto">
                    <h4 class="font-bold text-xl text-center mt-6">{{ $userData->name }}</h4>
                    <a href="{{ url('/users/profile') }}" class="btn btn-primary flex justify-center">
                        <i class="fas fa-edit"></i>プロフィール編集
                    </a>
                </div>
                <h3 class="font-bold text-lg">所属コミュニティ</h3>
                <h3 class="font-bold text-lg">参加予定のイベント</h3>
            </div>
        </div>
    </body>
</html>