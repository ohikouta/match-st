<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Cloudinary;

class ImageController extends Controller
{
    public function view()
    {
        return view("exs.exs");
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
        $image->url = $imagePath;
        $image->alt_text = $request["alt_text"];
        $image->save();
        
    
        // 成功した場合のリダイレクトなどを行う
        return redirect('/');
    }
}
