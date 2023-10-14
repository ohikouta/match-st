<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;
use App\Models\User;
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
        $userEvents = $user->events;
        
        // ログインユーザーのIDを取得
        $userId = $user->id;
        
        // ログインユーザーが管理者として関連付けられているコミュニティを取得
        $adminIndividuals = Individual::where('admin_id', $userId)->get();
        
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
        foreach ($futureEvent as $event) {
            $event->numberOfApplicants = $event->users->count();
        }
        $pastEvent = Event::where('event_date', '<', now())->get();
        foreach ($pastEvent as $event) {
            $event->numberOfApplicants = $event->users->count();
        }
        
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
                'userEvents' => $userEvents,
                'adminIndividuals' => $adminIndividuals, // ユーザーが管理者として関連付けられているコミュニティ
                ]);
    }
}
