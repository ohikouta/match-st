// import './bootstrap';

// import Alpine from 'alpinejs';
// import 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


 /* global $*/
$(document).ready(function() {
    $("#myform").submit(function(event) {
        event.preventDefault();
    });
});

 /* global individualId*/
 
 
 // 参加リクエスト送信のAjax

document.addEventListener('DOMContentLoaded', function() {
    // ボタン要素を取得
    var joinRequestButton = document.getElementById('joinRequestButton');
    
    // ボタンがクリックされたときにsendJoinRequest関数を呼び出す
    joinRequestButton.addEventListener('click', function() {
        sendJoinRequest();
    });
    
    // sendJoinRequest関数の定義（ここに関数本体を記述）
    function sendJoinRequest() {
        
        console.log("sendJoinRequestが発火していますよ20231022");
        
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
                    console.log(response);
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
        xhr.send();
        }
});


// 参加リクエストを許可するAjax処理
document.addEventListener('DOMContentLoaded', function() {
    // ボタン要素を取得
    var allowMembershipButton = document.getElementById('allowMembershipButton');
    
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


// タイムライン投稿のAjax

// フォームが送信されるときにイベントをリッスン

document.addEventListener('DOMContentLoaded', function () {
       
    var postTimelineButton = document.getElementById('postFormButton');
    var postCommentButton = document.getElementById('postCommentButton');
       
    postTimelineButton.addEventListener('click', function (event) {
        event.preventDefault(); // デフォルトのフォーム送信動作を無効化
        
        // フォームのデータを取得
        var content = document.querySelector('textarea[name="content"]').value;
        var individual_id = document.querySelector('input[name="individual_id"]').value;
        
        // 正規表現を使用して、content内の@usernameを抽出
        var mentionMatches = content.match(/@[\w]+/g);
        console.log(mentionMatches);
        var mentionsData = [];
        console.log(mentionsData);
        
        if (mentionMatches) {
            mentionsData = mentionMatches.map(function (mention) {
                // @を削除してユーザー名のみ取得
                return mention.substring(1);
            });
            
            console.log(mentionsData);
        }
        
        // リクエストデータをjson文字列に変換
        var requestData = JSON.stringify({
            content: content,
            individual_id: individual_id,
            mentions: mentionsData,
            message: content,
        });
        
        console.log('kkkkkkkkkk');
        
        // 関数呼び出し
        postTimeline(requestData);
        
        document.querySelector('textarea[name="content"]').value = '';
           
    });
    
    postCommentButton.addEventListener('click', function (event) {
        event.preventDefault();
        
        var content = document.querySelector('textarea[name="comment_content"]').value;
        var post_id = document.querySelector('input[name="post_id"]').value;
        
        // 正規表現を使用して、content内の@usernameを抽出
        var mentionMatches = content.match(/@[\w]+/g);
        var mentionsData = [];
        
        
        if (mentionMatches) {
            mentionsData = mentionMatches.map(function (mention) {
                // @を削除してユーザー名のみ取得
                return mention.substring(1);
            });
        }
        
        // リクエストデータをjson文字列に変換
        var requestData = JSON.stringify({
            content: content,
            post_id: post_id,
            mentions: mentionsData,
        });
        
        // 関数呼び出し
        addComment(requestData);
        
        document.querySelector('textarea[name="comment_content"]').value = '';
    });
       
    function postTimeline(requestData) {
        
        // LaravelからCSRFトークンを取得
        var csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        if (csrfTokenElement) {
            var csrfToken = csrfTokenElement.getAttribute('content');
            // ここでcsrfTokenを使用する処理を行う
        } else {
            // csrfTokenElementが存在しない場合のエラーハンドリング
            console.error('csrf-tokenのmeta要素が存在しません。');
        }
        
        
        // XHRオブジェクトを作成
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/timeline", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
        
        // レスポンスの処理
        xhr.onload = function () {
            console.log(xhr.status);
            console.log("201が帰ってきてねえぜ");
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log(response);
            } 
            if (xhr.status === 201) {
                try{
                    var response = JSON.parse(xhr.responseText);
                    console.log(response);
                    if (response.message) {
                        // 新しい投稿を生成
                        var newPostContainer = document.createElement('li');
                        newPostContainer.className = 'post bg-white p4 shadow-md rounded-lg p-4 mb-4';
                        
                        // 
                        var contentHTML = `
                            <div class="flex">
                                <p class="text-gray-800 mr-3">投稿日時: ${response.created_at}</p>
                                <p class="text-gray-800 mr-3">投稿者: ${response.user}</p>
                            </div>
                            <p class="text-gray-800 p-2">${response.content}
                        
                        `;
                        newPostContainer.innerHTML = contentHTML;
                        console.log("contentHTMLが追加されました。");
                        
                        var replyButton = document.createElement('button');
                        replyButton.className = 'text-blue-500 block flex justify-between pl-15 reply-button';
                        replyButton.innerHTML = `
                            <p class="inline ml-2">Reply</p>
                            <i class="far fa-comment-dots ml-2"></i>
                        `;
                        
                        // クリックイベント割当
                        replyButton.addEventListener('click', function () {
                            // 対応するコメントセクションとコメント表示を切り替え
                            var commentSection = newPostContainer.querySelector('.comment-section');
                            commentSection.classList.toggle('hidden');
                        });
                
                        newPostContainer.appendChild(replyButton);
                        console.log("replybuttonが追加されました。");
                
                        var commentSection = document.createElement('div');
                        commentSection.className = 'comment-section hidden';
                        commentSection.innerHTML = `
                            <p class="font-bold text-lg m-4">返信一覧</p>
                            <div id="comment-form" class="">
                                <form method="POST" action="/comment">
                                    <textarea name="comment_content" class="w-full" rows="1" placeholder="コメントを入力"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <button type="submit" class="btn btn primary mt-2">送信</button>
                                </form>
                            </div>
                        `;
                
                        newPostContainer.appendChild(commentSection);
                        console.log("conmmentsectionが追加されました。");
                
                        // 新しい投稿を投稿欄に追加
                        var postsContainer = document.querySelector('#posts-container');
                        postsContainer.insertBefore(newPostContainer, postsContainer.firstChild);
                   } else {
                       console.error('受信したjsonはnullまたは不正な形式です.');
                       alert('投稿に失敗しました');
                   }
                } catch (e) {
                    console.error('JSONデータのパースエラー:', e);
                }
           
           } else {
               console.error(xhr.statusText);
           }
        };
        
        // エラーハンドリング
        xhr.onerror = function () {
           console.error("リクエスト中にエラーが発生しました");
        };
        
        
        // リクエストを送信
        xhr.send(requestData);
       
    }
   
    // コメント追加のAjax
    // コメントを追加する Ajax リクエスト
    function addComment(requestData) {
        
        // LaravelからCSRFトークンを取得
        var csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        if (csrfTokenElement) {
            var csrfToken = csrfTokenElement.getAttribute('content');
            // ここでcsrfTokenを使用する処理を行う
        } else {
            // csrfTokenElementが存在しない場合のエラーハンドリング
            console.error('csrf-tokenのmeta要素が存在しません。');
        }
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/comment", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
    
        xhr.onload = function () {
            console.log(xhr.status);
            if (xhr.status === 201) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log(response);
                    if (response.message) {
                        // 新しいコメントを生成して表示エリアに追加
                        var newComment = document.createElement('div');
                        newComment.className = 'border border-gray-300 shadow-md p-4 rounded-lg m-2';
                        var contentHTML = `
                            <div class="flex">
                                <p class="text-gray-800 mr-3">返信日時: ${response.created_at}</p>
                                <p class="text-gray-800 mr-3">返信者: ${response.user}</p>
                            </div>
                            <p class="p-2">${response.content}
                        `;
                        newComment.innerHTML = contentHTML;
                        console.log("【コメントver】contentHTMLが追加されました。");
        
                        // 新しいコメントをコメント一覧に追加
                        var commentList = document.querySelector('#comment-list');
                        commentList.append(newComment);
                        
                    } else {
                        console.error('受信した JSON は null または不正な形式です.');
                        alert('コメントの追加に失敗しました');
                    }
                } catch (e) {
                    console.error('JSONデータのパースエラー', e);
                }
            } else {
                console.error(xhr.statusText);
            }
        };
    
        xhr.onerror = function () {
            console.error("リクエスト中にエラーが発生しました");
        };
    
        xhr.send(requestData);
    }
});



// メンションの実装
// document.addEventListener('DOMContentLoaded', function() {
//     // メンション機能の実装
//     const messageInput = document.getElementById('message');
//     messageInput.addEventListener('input', function () {
//         const message = this.value;
//         const mentions = message.match(/@(\w+)/g);

//         const xhr = new XMLHttpRequest();
//         xhr.open("POST", "/timeline", true);
//         xhr.setRequestHeader("Content-Type", "application/json");
//         xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");

//         xhr.onload = function() {
//             if (xhr.status === 201) {
//                 const response = JSON.parse(xhr.responseText);
//                 console.log(response);
//             }
//         };

//         const requestData = JSON.stringify({
//             _token: "{{ csrf_token() }}",
//             mentions: mentions,
//             content: message,
//         });

//         xhr.send(requestData);
//     });
// });



// function getNotifications() {
//     $.get('/get-notifications', function(data) {
//         // データを処理して通知を表示
//         const notificationContainer = document.getElementById('notificationContainer');
//         notificationContainer.innerHTML = '';
        
//         data.forEach(function(notification) {
//             // 各通知を表示する処理を追加
//             const notificationItem = document.createElement('div');
//             notificationItem.textContent = notification.message;
//             notificationContainer.appendChild(notificationItem);
            
//         });
//     });
// }

























