<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    //マイページ表示
    public function mypage(){
        //ログインしているユーザーのイベント情報を取得する
        $events = Auth::user()->events()->orderBy('created_at','desc')->paginate(10);
        //全イベント情報の取得
        $all = Event::orderBy('created_at','desc')->paginate(10);
        return view('events.mypage', compact('events'), compact('all'));
    }
    //検索
    public function search(Request $request){
        //inputに値があった場合に処理に入る
        if(!empty($request['from_date']) && !empty($request['to_date'])) {
            //検索処理
            $date = Event::getDate($request['from_date'], $request['to_date']);
        } else{
            //取得できなかった場合は全イベント情報を取得
            $date = Event::orderBy('created_at','desc')->paginate(10);
        }
        return view('events.search', compact('date'));
    }

    //イベント新規登録画面表示
    public function new()
    {
        $events = Category::all();

        return view('events.new',compact('events'));
    }
    //イベント新規作成
    public function create(Request $request)
    {
        //バリデーションチェック
        $request->validate([
            'category_id' => 'string|required',
            'from_date' => 'required|date',
            'to_date' => 'date|nullable',
            'comment' => 'required|string|max:255',
            'user_id' => 'integer',
        ]);
        $event = new Event;
        Auth::user()->events()->save($event->fill($request->all()));

        return redirect('/mypage')->with('flash_message', __('Event Complete'));
    }
    //イベント削除
    public function destroy($id)
    {
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/events/new')->with('flash_message', __('Event Delete Failure'));
        }
        Event::find($id)->delete();

        return redirect('/mypage')->with('flash_message', __('Event Deleted Complete'));
    }
    //イベントアップデート
    public function update(Request $request, $id)
    {
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/events/new')->with('flash_message', __('Event Update Failure'));
        }
        $event = Event::find($id);
        $event->fill($request->all())->save();

        return redirect('/mypage')->with('flash_message', __('Event Update Complete'));
    }
    //イベント編集画面表示
    public function edit($id)
    {
        // GETパラメータが数字かどうかをチェックする
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __('Event Edit Failure'));
        }
        $event = Auth::user()->events()->find($id);
        return view('events.edit', ['event' => $event]);
    }

}
