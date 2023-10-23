<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class TimelineController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'content' => 'required|max:255',
        ]);
        
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->content = $request->input('content');
        $post->individual_id = $request->input('individual_id');
        $post->save();
        
        // ポストが正常に保存された場合
        if ($post) {
            return response()->json(['message' => '投稿が成功しました'], 201);
        } else {
            return response()->json(['message' => '投稿に失敗しました'], 400);
        }
    }
    
    public function addComment(Request $request)
    {
        $request->validate([
            'comment_content' => 'required|max:255',
        ]);
        
        // コメントを保存
        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->content = $request->input('comment_content');
        $comment->save();
        
        // 成功時のリダイレクト
        return redirect('/');
    }
}
