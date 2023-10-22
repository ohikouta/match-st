// import './bootstrap';

// import Alpine from 'alpinejs';
// import 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

let str1 = "Tom";
console.log(str1); // -> Tom

function sayHello() {
  console.log("Hello, World!");
}


 /* global $*/
$(document).ready(function() {
    $("#myform").submit(function(event) {
        event.preventDefault();
    })
})

 /* global individualId*/
 /* global alm*/
 
 
// 外部JavaScriptファイル（external.js）内
window.addEventListener('DOMContentLoaded', function() {
    // ボタン要素を取得
    var joinRequestButton = document.getElementById('joinRequestButton');
    console.log("Hello, World!")
    
    // ボタンがクリックされたときにsendJoinRequest関数を呼び出す
    joinRequestButton.addEventListener('click', function() {
        sendJoinRequest();
    });
    
    // sendJoinRequest関数の定義（ここに関数本体を記述）
    function sendJoinRequest() {
        // 関数の中身はそのまま残してください
        // フォームのdataを取得
        var content = document.querySelector('textarea[name="content"]').value;
        var individual_id = document.querySelector('input[name="individual_id"]').value;
        
        console.log("sendJoinRequestが発火していますよ");
        
        // LaravelからCSRFトークンを取得
        var csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        if (csrfTokenElement) {
            var csrfToken = csrfTokenElement.getAttribute('content');
            // ここでcsrfTokenを使用する処理を行う
        } else {
            // csrfTokenElementが存在しない場合のエラーハンドリング
            console.error('csrf-tokenのmeta要素が存在しません。');
        }
        
        // XHRを使用してリクエストを送信
        var xhr = new XMLHttpRequest();
        xhr.open('POST', individualId, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // CSRFトークンを設定
        
        // デバッグ
        console.log(xhr.status);
        console.log(xhr.responseText);
        
        xhr.onload = function () {
            if (xhr.status === 201) {
                console.log(xhr.responseText);
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log(response)
                    if (response.message) {
                        // ポップアップメッセージを表示
                        alert('参加リクエストを送信しました');
                    } else {
                        // エラーメッセージを表示
                        alert('リクエストできません');
                    }
                } catch (e) {
                    console.error('JSONデータのパースエラー:', e);
                }
            } else {
                // エラーハンドリング
                console.error(xhr.statusText + xhr.status);
            }
        };
        
        xhr.onerror = function () {
            // エラーハンドリング
            console.error('ネットワークエラーが発生しました');
        };
        
        var requestData = JSON.stringify({
            content: content,
            individual_id: individual_id
        });
        
        xhr.send(requestData);
        }
});

document.addEventListener('DOMContentLoaded', function() {
    // ボタン要素を取得
    var allowMembershipButton = document.getElementById('allowMembershipButton');
    console.log("Hello, あろーするぜ");
    
    // allowMembershipが押されたときにallowMembershipを呼び出す
    var requestId = allowMembershipButton.getAttribute('data-request-id');
    allowMembershipButton.addEventListener('click', function(event) {
        event.preventDefault(); // フォームのデフォルトの送信を防ぐ
        
        // ユーザーIDと個別IDを取得
        var userId = document.querySelector('input[name="user_id"]').value;
        var individualId = document.querySelector('input[name="individual_id"]').value;
        
        allowMembership(requestId, userId, individualId);
    });
    
    function allowMembership(requestId, userId, individualId) {
        
        console.log("ハッカなのだ");
        
        // LaravelからCSRFトークンを取得
        var csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        if (csrfTokenElement) {
            var csrfToken = csrfTokenElement.getAttribute('content');
        } else {
            // csrfTokenElementが存在しない場合のエラーハンドリング
            console.error('csrf-tokenのmeta要素が存在しません。');
            return;
        }
        
        // XHRを使用してリクエストを送信
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/allow-membership', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // CSRFトークンを設定
        
        // debug
        console.log(xhr.status);
        console.log(xhr.statusText);

        xhr.onload = function () {
            console.log(xhr.status);
            if (xhr.status === 201) {
                try {
                    console.log("確実に成功フラグ");
                    var response = JSON.parse(xhr.responseText);
                    // 成功時にメッセージを表示
                    if (response.message) {
                        // ポップアップメッセージを表示
                        alert('参加リクエストを許可しました: ' + response.message);
                        
                    } else {
                        // エラーメッセージを表示
                        alert('リクエストできません');
                    }
                    
                    // リクエストをビューから削除
                    var requestElement = document.getElementById('request-' + requestId);
                    if (requestElement) {
                        requestElement.remove();
                    }
                } catch (e) {
                    console.error('JSONデータのパースエラー:', e);
                }
            } else {
                // エラーハンドリング
                console.error(xhr.statusText + xhr.status);
            }
        };
        
        xhr.onerror = function () {
            // エラーハンドリング
            console.error('ネットワークエラーが発生しました');
        };
        
        var requestData = JSON.stringify({
            user_id: userId,
            individual_id: individualId
        });
        
        xhr.send(requestData);
    }
});

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