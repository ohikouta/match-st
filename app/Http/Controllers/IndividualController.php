<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;
use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use App\Models\MembershipRequest;
use Cloudinary;

class IndividualController extends Controller
{
    public function show()
    {
        return view('individuals.plan');
    }
    
    public function store(Request $request)
    {
        // フォームの入力を検証・バリデーションする
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーションルール
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'category' => 'required|in:qualification,product,topic',
            'admin_id' => 'required|numeric', // 管理者IDのバリデーションルール
        ]);
    
        // 画像ファイルの処理（アップロードなど）
        if ($request->hasFile('image')) {
            $imagePath = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath(); // 適切なディレクトリにアップロード
        } else {
            $imagePath = null; // 画像がアップロードされなかった場合
        }
    
        // レコードを作成しデータベースに挿入
        $individual = new Individual;
        $individual->image = $imagePath;
        $individual->title = $validatedData['title'];
        $individual->summary = $validatedData['summary'];
        $individual->category = $validatedData['category'];
        $individual->admin_id = $validatedData['admin_id'];
        $individual->save();
    
        // 成功した場合のリダイレクトなどを行う
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
        
        $posts = $individual->posts->reverse();
        
        
        return view('individuals.show', compact('individual', 'posts'));
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
        $adminImage = Image::find(1);
    
        if (!$individual) {
            // $idに基づくindividualsレコードが存在しない場合のエラーハンドリング
            abort(404);
        }
            
        $requests = MembershipRequest::where('individuals_id', $id)
            ->where('status', 'pending')
            ->get();
        
        return view('individuals.admin', ['individual' => $individual, 'requests' => $requests, 'adminImage' => $adminImage]);
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
