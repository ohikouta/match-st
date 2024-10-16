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
        <p>ここにゴニョゴニョ書く</p>
        <h1>計画を立てよう！</h1>

        <hr>
            <div>
            <h2>今週の計画</h2>
            <table border="1">
                <tr>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
                <tr>
                    @for($i=1; $i<=7; $i++)
                    <td>
                        <form action="/nukemiti" method="POST">
                            @csrf
                            <input type="hidden" name="plan[day_id]" value="{{ $i }}">
                            <input type="hidden" name="plan[work_id]" value="1" >
                            <input type="hidden" name="plan[student_id]" value="1">
                            <textarea name="plan[content][]" placeholder="今週も頑張りましょう！"></textarea>
                            <input type="submit" value="完了"/>
                            </td>
                        </form>
                    @endfor
                </tr>
            </table>
        </div>
        <button type=“button” onclick="location.href='/'"><!-- onclick についてわかっていない -->
            戻る
        </button>
        <hr>
    </body>
</html>