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
    
    /*
    public function store(Request $request, Base $base)
    {
        dd($request->all());

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
    */
    
    public function show(Base $base)
	{
		return view('users/show')->with(['base' => $base]);
		// 'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス
	}
    
    
    public function store(Request $request, Base $base)
    {
        $input = $request['base'];
        $base->fill($input)->save();
        return redirect('/users/' . $base->id);
        
    }
    
}
