<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;


class TimelineController extends Controller
{
    public function store(Request $request)
    {
        // メンションからユーザー名を抽出
        $mentionsData = $request->input('mentions');
        $content = $request->input('content');
        $individualId = $request->input('individual_id');
        
        // タイムライン投稿とメンションの非同期処理を実行
        // コントローラー内で別の2つの関数を呼び出す
        $postPromise = $this->createTimelinePost($request);
        $mentionPromise = $this->sendMentions($mentionsData, $request->input('message'));

        
        // 両方の処理が成功した場合に成功のレスポンスを返す
        try {
            $postResult = $postPromise->wait();
            $mentionResult = $mentionPromise->wait();
            
            return response()->json(['message' => 'データを受け取りました', 'post' => $postResult, 'mention' => $mentionResult]);
        } catch (\Exception $e) {
            // エラーハンドリング
            return response()->json(['message' => 'エラーが発生しました'], 500);
        }
    }
    
    // タイムライン投稿の非同期処理
    private function createTimelinePost(Request $request)
    {
        return Http::post('http://example.com/api/timeline', $request->all());
    }
    
    // メンションの非同期処理
    private function sendMentions($mentionsData, $message)
    {
        $promises = [];

        foreach ($mentionsData as $mention) {
            $mentionedUser = User::where('name', substr($mention, 1))->first();
            if ($mentionedUser) {
                $notification = new Notification();
                $fromUser = auth()->user();
                $notification->user_id = $mentionedUser->id;
                $notification->message = $message;
                $notification->sender_id = $fromUser->id;
                
                // cURLを使用して非同期リクエストを送信
                $promises[] = $this->sendNotification($notification);
                dd($promises);
            }
        }
        
        // 各非同期リクエストの完了を待つ
        $results = collect($promises)->map(function ($promise) {
            return $promise->then(function ($response) {
                if ($response->getStatusCode() === 200) {
                    // リクエストが成功した場合の処理
                    return 'Success';
                } else {
                    // リクエストが失敗した場合の処理
                    return 'Failure';
                }
            });
        });
        
        // 最終的なレスポンスを返す
        return $results->toArray();
    }

    private function sendNotification($notification)
    {
        $ch = curl_init('http://example.com/send-notification');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notification->toArray()));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $promise = curl_exec($ch);
        curl_close($ch);
        
        return resolve($promise);
    }
    
    //     // メンションされたユーザーに通知を送信
    //     if (!empty($mentionsData)) {
    //         foreach ($mentionsData as $mention) {
    //             // 通知の送信ロジックを実装
                
    //             // メンションされたユーザーを特定
    //             $mentionedUser = User::where('username', substr($mention, 1))->first();
    //             // 通知を作成
    //             $notification = new Notification();
                
    //             // 通知を送信するユーザーを特定: 通知を送信したユーザー
    //             $fromUser = auth()->user();
    //             $notification->user_id = $mentionedUser->id;
    //             $notification->message = $request->input('message');
    //             $notification->sender_id = $fromUser->id;
    //             $notification->save();
                
    //         }
    //     }
        
    //     $validateData = $request->validate([
    //         'content' => 'required|max:255',
    //     ]);
        
    //     $post = new Post;
    //     $post->user_id = auth()->user()->id;
    //     $post->content = $request->input('content');
    //     $post->individual_id = $request->input('individual_id');
    //     $post->save();
        
    //     return response()->json(['message' => 'データを受け取りました']);
        
    //     // ポストが確実に保存された場合!
    //     if ($post) {
    //         // 必要な情報を連想配列に追加
    //         $responseData = [
    //             'message' => '投稿が成功しました',
    //             'content' => $post->content,
    //             'created_at' => Carbon::parse($post->created_at)->format('Y-m-d H:i:s'),
    //             'user' => $post->user->name,
    //         ];
    //         return response()->json($responseData, 201);
    //     } else {
    //         return response()->json(['message' => '投稿に失敗しました'], 400);
    //     }
    
    // public function addComment(Request $request)
    // {
    //     $request->validate([
    //         'content' => 'required|max:255',
    //     ]);
        
    //     // コメントを保存
    //     $comment = new Comment;
    //     $comment->user_id = auth()->user()->id;
    //     $comment->post_id = $request->input('post_id');
    //     $comment->content = $request->input('content');
    //     $comment->save();
        
    //     if ($comment) {
    //         $responseData = [
    //             'message' => 'コメントを送信しました',
    //             'content' => $comment->content,
    //             'created_at' => Carbon::parse($comment->created_at)->format('Y-m-d H:i:s'),
    //             'user' => $comment->user->name,
    //         ];
    //         return response()->json($responseData, 201);
    //     } else {
    //         return response()->json(['message' => 'コメント送信に失敗しました'], 400);
    //     }
    // }
}
