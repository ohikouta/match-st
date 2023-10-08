<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;
use App\Models\User;
use App\Models\Post;
use App\Models\MembershipRequest;
use Cloudinary;

class IndividualController extends Controller
{
    public function show()
    {
        return view('individuals.plan');
    }
    
    public function store(Request $request, individual $individual)
    {
        $input = $request['individual'];
        $individual->fill($input)->save();
        return redirect('/individuals/' . $individual->id);
    }
    
    public function showResult(Individual $individual)
    {
        return view('individuals.result')->with(['individual' => $individual]);
    }
    
    public function showDetail($id)
    {
        $individual = Individual::with('posts')->find($id);
        
        if (!$individual) {
            return abort(404);
        }
        
        
        return view('individuals.show', compact('individual'));
    }
    
    public function sendJoinRequest(Request $request, Individual $individual)
    {
        // リクエストを作成し、データベースに保存
        $membershipRequest = new MembershipRequest([
           'user_id' => auth()->user()->id,
           'individuals_id' => $individual->id,
           'status' => 'pending',
        ]);
        $membershipRequest->save();
        
        return response()->json(['message'=>'参加リクエストを送信しました'], 201);
    }
    
    public function showAdmin(MembershipRequest $membershiprequest, $id)
    {
        // individualsテーブルからレコードを取得
        $individual = Individual::find($id);
    
        if (!$individual) {
            // $idに基づくindividualsレコードが存在しない場合のエラーハンドリング
            abort(404);
        }
            
        $requests = MembershipRequest::where('individuals_id', $id)
            ->where('status', 'pending')
            ->get();
        
        return view('individuals.admin', ['individual' => $individual, 'requests' => $requests]);
    }
    
    public function update(Request $request, $id)
    {
        // バリデーションルールを定義することをお勧めします
        $request->validate([
            'title' => 'required|max:50',
            'summary' => 'required',
            'image' => 'nullable|image', // 画像のアップロードを許可する場合
        ]);

        // データベースを更新
        $individual = Individual::find($id);
        $individual->title = $request->input('title');
        $individual->summary = $request->input('summary');

        
        if ($request->hasFile('image')) {
            // Cloudinaryに画像をアップロードし、そのURLを取得
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $individual->image = $image_url;
        }
            
        $individual->save();

        return redirect()->route('individuals.admin', $id)->with('success', '編集が完了しました');
    }
    
}
