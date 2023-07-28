<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base; // Baseモデルをインポート
use Illuminate\Support\Facades\DB; // DBクラスをインポート

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        // Storeメソッドが実行されたことを確認するための合図的なコード
    　　dd('Storeメソッドが実行されました');
        // バリデーションが必要な場合はここでバリデーションを行う
        
        // データベースのトランザクションを開始
        DB::beginTransaction();
        try {
            // フォームのデータをモデルに保存
            $user = new Base();
            $user->name = $request->input('name');
            $user->univ = $request->input('univ');
            // 他のフォームデータも必要に応じてセットする
            
            $user->save(); // データベースに保存
            
            // トランザクションのコミット
            DB::commit();
            
            // データの保存後、リダイレクトなどの適切な処理を行う
            return redirect()->route('users.index')->with('success', 'ユーザーが作成されました');
            
        } catch (\Exception $e) {
            //  トランザクションのロールバック
            DB::rollback();
            
            // エラーログなどにエラー情報を記録することも可能
            
            // エラー処理
            return redirect()->back()->with('error', 'ユーザーの作成に失敗しました。');
        }
        
        // フォームからのデータをモデルに保存
    }
}
