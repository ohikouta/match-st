<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function view()
    {
        return view("images.exs");
    }
    
    public function store(Request $request)
    {
        // フォームの入力を検証・バリデーションする
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーションルール
            
        ]);
    
        // 画像ファイルの処理（アップロードなど）
        if ($request->hasFile('image')) {
            $imagePath = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath(); // 適切なディレクトリにアップロード
        } else {
            $imagePath = null; // 画像がアップロードされなかった場合
        }
    
        // レコードを作成しデータベースに挿入
        $image = new Image;
        $image->image = $imagePath;
        $image->save();
        
    
        // 成功した場合のリダイレクトなどを行う
        return redirect('/');
    }
}
