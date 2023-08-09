<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index');
    }
    
    public function show()
    {
        return view('events.plan');
    }
    
    public function look(Event $event)
    {
        return view('events.look')->with(['events' => $event->getPaginateBylimit(5)]);
    }
    

}
