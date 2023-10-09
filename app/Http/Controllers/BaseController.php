<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;
use App\Models\User;
// eventデータベースの情報も使いたいから
use App\Models\Community;
use App\Models\Event;
use App\Models\Individual;
use Cloudinary;

class BaseController extends Controller
{
    public function start(Event $event, Individual $individual)
    {
        // return view('bases.index')->with(['bases' => $base->getPaginateByLimit(10)]);
        return view('start')
            ->with([
                'events' => $event->getPaginateByLimit(5),
                'individuals' => $individual->getPaginateByLimit(5)
                ]);
            
    }
    
    public function index(Request $request, Base $base, Community $community, Individual $individual, Event $event, User $user)
    {
        // ユーザー情報を取得
        $user = auth()->user();
        
        // ユーザーが所属しているコミュニティを取得
        $userCommunities = $user->communities;
        
        $communitiesData = $community->getDataSomehow();
        
        $qualificationData = Individual::where('category', 'qualification')->paginate(3, ["*"], 'qualification-page')
                                                                ->appends(["product-page" => $request->input('product-page')])
                                                                ->appends(["topic-page" => $request->input('topic-page')]);
        $productData = Individual::where('category', 'product')->paginate(3, ["*"], 'product-page')
                                                                ->appends(["qualification-page" => $request->input('qualification-page')])
                                                                ->appends(["topic-page" => $request->input('topic-page')]);
        $topicData = Individual::where('category', 'topic')->paginate(3, ["*"], 'topic-page')
                                                                ->appends(["qualification-page" => $request->input('qualification-page')])
                                                                ->appends(["product-page" => $request->input('product-page')]);
        $futureEvent = Event::where('event_date', '>', now())->get();
        $pastEvent = Event::where('event_date', '<', now())->get();
        
        return view('bases.index')
        ->with(['bases' => $base->getPaginateByLimit(3), 
                'communities' => $communitiesData,
                'qualificationData' => $qualificationData,
                'productData' => $productData,
                'topicData' => $topicData,
                'events' => $event->getPaginateByLimit(5),
                'futureEvent' => $futureEvent,
                'pastEvent' => $pastEvent,
                'userData' => $user,
                'userCommunities' => $userCommunities, // ユーザーが所属するコミュニティをビューに渡す
                ]);
    }
}
