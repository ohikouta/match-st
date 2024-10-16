<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;

class MentionController extends Controller
{
    public function sendNotification(Request $request)
    {
        // メッセージからユーザー名を抽出
        $mentions = preg_match_all('/@(\w+)/', $request->input('message'), $matches);
        $usernames = $matches[1];
        
        // メンションされたユーザーに通知を送信
        foreach ($usernames as $username) {
            // 通知の送信ロジックを実装
            
            // メンションされたユーザーを特定
            $mentionedUser = User::where('username', $username)->first();
            // 通知を作成
            $notification = new Notification();
            
            // 通知を送信するユーザーを特定: 通知を送信したユーザー
            $fromUser = auth()->user();
            $notification->user_id = $mentionedUser->id;
            $notification->message = $request->input('message');
            $notification->sender_id = $fromUser->id;
            $notification->save();
            
        }
        
        return response()->json(['message' => '通知が送信されました。']);
    }
    
    public function getNotifications(Request $request)
    {
        $notifications = $request->user()->notifications;
        return response()->json($notifications);
    }
}


