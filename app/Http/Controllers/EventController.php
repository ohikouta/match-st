<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
use App\Models\Image;
use Cloudinary;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index');
    }
    
    // 入力欄表示 → 登録 → 結果表示
    public function show()
    {
        $planImage = Image::find(2);
        
        return view('events.plan', ['planImage' => $planImage]);
    }
    
    
    public function store(Request $request)
    {
        // 入力バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'summary' => 'nullable',
            'event_date' => 'required|date',
            'address' => 'required',
            'max_participants' => 'required|integer',
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
            'max_participants' => $request->input('max_participants'),
        ]);
        
        $event->save();
        
        // メッセージを設定
        $message = 'イベント情報を登録しました';
        
        return redirect('/event/' . $event->id);
    }

    
    public function showResult(Event $event)
    {
        return view('events.result')->with(['event' => $event]);
    }
    
    public function showDetail($eventid) 
    {
        // $eventid を使用して、データベースから個別のイベント情報を取得
        $event = Event::find($eventid);
        $eventImage = Image::find(5);
    
        // イベント情報をビューに渡す
        return view('events.showdt', ['event' => $event, 'eventImage' => $eventImage]);
    }
    
    public function showRequestResult($eventid)
    {
        
        $userId = auth()->user()->id;
        
        $user = User::find($userId);
        $event = Event::find($eventid);
        
        $user->events()->attach($event);
        
        $event = Event::find($eventid);
        
        return view('events.request_result', ['event' => $event]);
    }
        
    public function showAdmin($id)
    {
        $event = Event::find($id);
        $adminImage = Image::find(1);
        
        return view('events.admin', ['event' => $event, 'adminImage' => $adminImage]);
    }
    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'summary' => 'nullable',
            'event_date' => 'required|date',
            'address' => 'required',
        ]);
        
        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->summary = $request->input('summary');
        $event->event_date = $request->input('event_date');
        $event->address = $request->input('address');
        
        $event->save();
        
        return redirect()->route('events.admin', $id)->with('success', '編集が完了しました');
    }
    
}
