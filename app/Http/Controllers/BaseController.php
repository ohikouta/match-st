<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;
// eventデータベースの情報も使いたいから
use App\Models\Community;
use App\Models\Event;
use App\Models\Individual;

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
    
    public function index(Base $base, Community $community, Individual $individual, Event $event)
    {
        $communitiesData = $community->getDataSomehow();
        
        $qualificationData = Individual::where('category', 'qualification')->paginate(3);
        $productData = Individual::where('category', 'product')->paginate(3);
        $topicData = Individual::where('category', 'topic')->paginate(3);
        $futureEvent = Event::where('event_date', '>', now());
        $pastEvent = Event::where('event_date', '<', now());
        
        return view('bases.index')
        ->with(['bases' => $base->getPaginateByLimit(3), 
                'communities' => $communitiesData,
                'qualificationData' => $qualificationData,
                'productData' => $productData,
                'topicData' => $topicData,
                'events' => $event->getPaginateByLimit(5),
                'futureEvent' => $futureEvent,
                'pastEvent' => $pastEvent,
                ]);
    }
}
