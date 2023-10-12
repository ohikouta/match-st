<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    
    
    public function store(Request $request)
    {
        
        
        // 入力バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'summary' => 'nullable',
            'event_date' => 'required|date',
            'address' => 'required',
        ]);
        
        
        
        // ログインユーザーのIDを取得
        $admin_id = Auth::id();
        
        // Eventモデルを作成し、ログインユーザーのIDを設定
        $event = new Event([
            'name' => $request->input('name'),
            'summary' => $request->input('summary'),
            'event_date' => $request->input('event_date'),
            'admin_id' => $admin_id,
            'address' => $request->input('address'),
        ]);
        
        
        $event->save();
        
        // メッセージを設定
        $message = 'イベント情報を登録しました';
        
        return redirect('/event/' . $event->id);
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
    
    public function showDetail( $eventid) 
    {
        // $eventid を使用して、データベースから個別のイベント情報を取得
        $event = Event::find($eventid);
    
        // イベント情報をビューに渡す
        return view('events.showdt', ['event' => $event]);
    }
        
    
}
