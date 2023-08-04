<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Univ;
use Illuminate\Support\Facades\DB; // DBクラスをインポート

class UnivController extends Controller
{
    public function show($univName)
    {
        
        $university = Univ::where('univ_name', $univName)->first();
        if (!$university) {
            abort(404);
        }
        
        return view('univ/show')->with(['university' => $university]);
    }
}
