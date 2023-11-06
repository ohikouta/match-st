<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;
use App\Models\User;
use App\Models\Community;
use App\Models\Event;
use App\Models\Individual;
use App\Models\Image;
use App\Models\Notification;
use Cloudinary;

class BaseController extends Controller
{
    public function start(Event $event, Individual $individual)
    {
        
        $qualificationData = Individual::where('category', 'qualification')->get();
        $productData = Individual::where('category', 'product')->get();
        $topicData = Individual::where('category', 'topic')->get();
        $futureEvent = Event::where('event_date', '>', now())->get();
        
        foreach ($futureEvent as $event) {
            $event->numberOfApplicants = $event->users->count();
        }
        $pastEvent = Event::where('event_date', '<', now())->get();
        foreach ($pastEvent as $event) {
            $event->numberOfApplicants = $event->users->count();
        }
        
        // return view('bases.index')->with(['bases' => $base->getPaginateByLimit(10)]);
        return view('start')
            ->with([
                'qualificationData' => $qualificationData,
                'productData' => $productData,
                'topicData' => $topicData,
                'futureEvent' => $futureEvent,
                'pastEvent' => $pastEvent,
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
        $notificationData = Notification::where('user_id', $userId)->where('read', 0)->get();
        
        $communitiesData = $community->getDataSomehow();
        
        $qualificationData = Individual::where('category', 'qualification')->get();
        $productData = Individual::where('category', 'product')->get();
        $topicData = Individual::where('category', 'topic')->get();
        $futureEvent = Event::where('event_date', '>', now())->get();
        
        // 固定画像の取得
        $individualImage = Image::find(3);
        $eventImage = Image::find(6);
        
        
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
                'notificationData' => $notificationData,
                // 固定画像
                'individualImage' => $individualImage,
                'eventImage' => $eventImage,
                'userCommunities' => $userCommunities, // ユーザーが所属するコミュニティをビューに渡す
                'userEvents' => $userEvents,
                'adminIndividuals' => $adminIndividuals, // ユーザーが管理者として関連付けられているコミュニティ
                ]);
    }
}
