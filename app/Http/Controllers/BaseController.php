<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;
// eventデータベースの情報も使いたいから
use App\Models\Event;
use App\Models\Community;

class BaseController extends Controller
{
    public function start(Event $event)
    {
        // return view('bases.index')->with(['bases' => $base->getPaginateByLimit(10)]);
        return view('start')->with(['events' => $event->getPaginateByLimit(5)]);
    }
    
    public function index(Base $base, Community $community)
    {
        $communitiesData = $community->getDataSomehow();
        return view('bases.index')->with(['bases' => $base->getPaginateByLimit(10), 'communities' => $communitiesData]);
    }
}
