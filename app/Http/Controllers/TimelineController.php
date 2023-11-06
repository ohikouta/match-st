<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;

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
        var_dump($postPromise);
        $mentionPromise = $this->sendMentions($mentionsData, $request->input('message'));
        var_dump($mentionPromise);

        // 両方の処理が成功した場合に成功のレスポンスを返す
        try {
            $postResult = $postPromise->body();
            // $mentionResult = $mentionPromise->body();
            
            return response()->json(['message' => 'データを受け取りました', 'post' => $postResult]);
        } catch (\Exception $e) {
            // エラーハンドリング
            return response()->json(['message' => 'エラーが発生しました'], 500);
        }
    }
    
    // タイムライン投稿の非同期処理
    private function createTimelinePost(Request $request)
    {
        // タイムライン投稿を作成
        $response = Http::post('http://example.com/api/timeline', $request->all());
        dd($response->body());
        // リクエストが成功した場合
        if ($response->successful()) {
            // タイムライン投稿のデータを取得
            $postData = $response->json();
            
            // タイムライン投稿が確実に保存された場合の処理
            if (!empty($postData)) {
                // データベースにも投稿を保存
                $this->savePostToDatabase($postData);
                $responseData = [
                    'message' => '投稿が成功しました',
                    'content' => $postData['content'],
                    'created_at' => $postData['created_at'],
                    'user' => $postData['user'],
                ];
                return response()->json($responseData, 201);
                
            } else {
                return response()->json(['message' => 'タイムライン投稿の取得失敗'], 500);
            }
        } else {
            return response()->json(['message' => 'タイムライン投稿作成失敗'], 400);
        }
    }
    
<<<<<<< HEAD
    private function savePostToDatabase($postData)
    {
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->content = $postData['content'];
        $post->individual_id = $postData['individual_id'];
        
        // データベースに保存
        $post->save();
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
                
                // Guzzleを使用して非同期リクエストを送信
                $promises[] = $this->sendNotification($notification);
            }
        }
        
        // 各非同期リクエストの完了を待つ
        $results = collect($promises)->map(function ($promise) {
            return $promise->body();
        });
        
        // 最終的なレスポンスを返す
        return $results;
    }

    private function sendNotification($notification)
    {
        return Http::post('http://example.com/send-notification', $notification->toArray());
=======
    public function deletePost($id)
    {
        $post = Post::find($id);
        
        if ($post) {
            $post->delete();
            return response('', 204);
        } else {
            return response('削除に失敗しました', 400);
        }
    }
    
    public function deleteComment($id) {
        $comment = Comment::find($id);
        
        if ($comment) {
            $comment->delete();
            return response('', 204);
        } else {
            return response('削除に失敗しました', 400);
        }
>>>>>>> origin/master
    }
}

