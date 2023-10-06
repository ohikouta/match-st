<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;
use App\Models\User;
use App\Models\Post;
use App\Models\MembershipRequest;

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
        $requests = MembershipRequest::where('individuals_id', $id)
            ->where('status', 'pending')
            ->get();
        
        return view('individuals.admin', ['requests' => $requests]);
    }
    
}
