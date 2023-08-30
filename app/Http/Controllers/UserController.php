<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Base; // Baseモデルをインポート
use App\Models\Univ; // Univモデルをインポート
use App\Models\User; // Userモデルをインポート
use Illuminate\Support\Facades\DB; // DBクラスをインポート
use Illuminate\Support\Facades\Auth; // ログインユーザーの情報取得

class UserController extends Controller
{
    public function profile()
    {
        // ログインユーザーの情報を取得
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);
    }
    
    public function show(Base $base)
	{
		return view('users/show')->with(['base' => $base]);
		// 'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス
	}
    
    
    public function store(Request $request, Base $base, Univ $univ)
    {
        $univData = [
            'univ_name' => $request->input('univ')['univ_name'],
            'locate' => $request->input('univ')['locate'],
            // 他の必要なカラムを追加
        ];
        
        $baseData = [
            'name' => $request->input('base')['name'],
            'univ' => $univData['univ_name'],
            // 他の必要なカラムを追加
        ];
        
        $univ = Univ::create($univData);
        $base = Base::create($baseData);
        
        return redirect('/users/' . $base->id);
        
    }
    
    
    
}
