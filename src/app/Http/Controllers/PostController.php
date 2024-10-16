<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    // フォームからの投稿を処理するメソッド
    public function store(Request $request)
    {
        // バリデーションのルールを定義（必要に応じて変更してください）
        $rules = [
            'user_id' => 'required',
            'content' => 'required',
            'individual_id' => 'required',
        ];

        // バリデーションを実行
        $request->validate($rules);

        // データを保存
        $post = new Post();
        $post->user_id = $request->input('user_id');
        $post->content = $request->input('content');
        $post->individual_id = $request->input('individual_id');
        $post->save();

        // 成功時のレスポンス
        return response()->json(['message' => '投稿が保存されました'], 201);
    }

}
