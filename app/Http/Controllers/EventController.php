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
    
    // 入力欄表示 → 登録 → 結果表示
    public function show()
    {
        return view('events.plan');
    }
    
    
    public function store(Request $request, Event $event)
    {
        $input = $request['event'];
        $event->fill($input)->save();
        return redirect('/events/' . $event->id);
    }

    
    public function showResult(Event $event)
    {
        return view('events.show')->with(['event' => $event]);
    }

    // イベント一覧を表示する
    public function look(Event $event)
    {
        return view('events.look')->with(['events' => $event->getPaginateBylimit(5)]);
    }
    
    public function update(Request $request, $id)
    {
        $community = Community::find($id);
        
        $imagePath = $request->file('image')->store('images');
        
        $community->image_path = $imagePath;
        $community->save();
        
        return redirect()->route('');
    }
    

}
