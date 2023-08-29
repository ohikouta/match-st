<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Base; // Baseモデルをインポート
use App\Models\Univ; // Univモデルをインポート
use Illuminate\Support\Facades\DB; // DBクラスをインポート

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
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
