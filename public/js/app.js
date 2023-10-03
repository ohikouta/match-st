// import './bootstrap';

// import Alpine from 'alpinejs';
// import 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

function sayHello() {
  console.log("Hello, World!");
}

 /* global $*/
// 参加リクエスト送信の処理
function sendJoinRequest() {
    
    // フォームのdataを取得
    var content = document.querySelector('textarea[name="content"]').value;
    var individual_id = document.querySelector('input[name="individual_id"]').value;
    
    console.log("sendJoinRequestが発火していますよ");
    $.ajax({
        type: "POST",
        url: '/timeline', //リクエストを送信するURLを指定する
        data: {
            // リクエストデータをここに追加
            content: content,
            individual_id: individual_id,
            _token: '{{ csrf_token() }}', // CSRFトークンを送信
        },
        success: function (response) {
            // サーバーからの応答を処理する
            if (response.message) {
                // ポップアップメッセージを表示
                alert('投稿が成功しました');
            } else {
                // エラーメッセージを表示
                alert('投稿に失敗しました');
            }
        },
        error: function (error) {
            // エラーハンドリング
            console.error(error);
        },
    });
}