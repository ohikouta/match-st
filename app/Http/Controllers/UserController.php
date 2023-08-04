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
