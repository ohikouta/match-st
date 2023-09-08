<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class CommunityController extends Controller
{
    
    public function show($category)
    {
        // $university ->  Univモデルのuniv_nameカラムから、$univNameに最初に合致するレコードを取り出す
        $community = Community::where('category', $category)->first();
        if (!$community) {
            abort(404);
        }
        
        return view('communities/show')->with(['community' => $community]);
    }
}
