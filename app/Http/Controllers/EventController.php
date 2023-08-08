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
    
    public function showResult(Event $event)
    {
        return view('events.show')->with(['event' => $event]);
    }
    
    public function store(Request $request, Event $event)
    {
        $input = $request['event'];
        $event->fill($input)->save();
        return redirect('/events/' . $event->id);
    }
}
