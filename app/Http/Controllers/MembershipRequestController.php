<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembershipRequest;
use App\Models\Individual;

class MembershipRequestController extends Controller
{
    public function allowMembership(Request $request)
    {
        // コミュニティ参加許可のロジックを実装

        
        // リクエストを送信したユーザーの情報を取得
        $userId = $request->input('user_id');

        $individualId = $request->input('individual_id');
        // ユーザーをコミュニティに追加
        $individual = Individual::find($individualId);
       
        
        $individual->users()->attach($userId);
        
        // リクエストを削除
        MembershipRequest::where('user_id', $userId)->where('individuals_id', $individualId)->delete();
        
        // 参加リクエストを送信したユーザーに通知を送信
        // 通知のロジックを実装する必要がある
        
        // 成功メッセージを設定
        session()->flash('success', 'コミュニティ参加を許可しました');
        
        return response()->json(['message'=>'リクエスト処理'], 201);
    }
}
