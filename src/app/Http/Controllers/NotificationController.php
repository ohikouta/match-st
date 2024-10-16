<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\User;

class NotificationController extends Controller
{
    public function sendNotification(Request $request) {
        // メンション通知の送信ロジックを実装
        $mentionUsers = $request->input('mentionedUsers');
        $content = $request->input('content');
        $senderId = auth()->user()->id;
        $individualId = $request->input('individual_id');
        
        
        
        // メンション通知処理実装
        foreach ($mentionUsers as $username) {
            $user = User::where('name', $username)->first();
            
            if($user) {
                // 通知をデータベースに保存
                $notification = new Notification;
                $notification->user_id = $user->id;
                $notification->message = $content;
                $notification->sender_id = $senderId;
                $notification->individual_id = $individualId;
                $notification->save();
            }
            
        }
        return response()->json(['message' => $mentionUsers]);
        
    }
}



