<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PhotosController extends Controller
{
    //写真新規登録画面表示
    public function new()
    {
        return view('photos.new');
    }
    //写真新規作成
    public function create(Request $request)
    {

        $photo = new Photo();
        //ファイル取得
        $imagefile1 = $request->file('pic1');
        $temp_path1 = $imagefile1->store('public/temp');
        $filename1 = str_replace('public/temp/', '', $temp_path1);
        $photo->fill(['pic1' => $filename1]);

        //ファイル取得
            $imagefile2 = $request->file('pic2');
        if(!empty($imagefile2)){
            $temp_path2 = $imagefile2->store('public/temp');
            $filename2 = str_replace('public/temp/', '', $temp_path2);
            $photo->fill(['pic2' => $filename2]);
        }
        //ファイル取得
        $imagefile3 = $request->file('pic3');
        if(!empty($imagefile3)) {
            $temp_path3 = $imagefile3->store('public/temp');
            $filename3 = str_replace('public/temp/', '', $temp_path3);
            $photo->fill(['pic3' => $filename3]);
        }
        $photo->fill(['comment' => $request->comment]);
        $photo->fill(['user_id' => Auth::id()]);
        //バリデーションチェック 8/27処理を追加した
        $request->validate([
            'pic1' => 'file|required|max:255',
            'pic2' => 'file|nullable|max:255',
            'pic3' => 'file|nullable|max:255',
            'comment' => 'nullable|string|max:255',
            'user_id' => 'integer',
        ]);
        $photo->save();

        return redirect('/photos/new')->with('flash_message', __('Photo Complete'));
    }
    //写真一覧画面
    public function index(){
        $photos = Auth::user()->photos()->orderBy('created_at','desc')->paginate(10);
        $all = Photo::orderBy('created_at','desc')->paginate(10);

        return view('photos.index', compact('photos'), compact('all'));
    }
    //写真削除
    public function destroy($id, Request $request)
    {
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message', __('Photo Delete Failure'));
        }
        Photo::find($id)->delete();
        File::delete('storage/temp/'.$request->pic1);

        if(strcmp($request->pic2,'noimage.jpg')<>0){
            File::delete('storage/temp/'.$request->pic2);
        }
        if(strcmp($request->pic3,'noimage.jpg')<>0){
            File::delete('storage/temp/'.$request->pic3);
        }

        return redirect('/index')->with('flash_message', __('Photo Delete Complete'));
    }
    //写真更新機能は不要のため削除する
//    public function update(Request $request, $id)
//    {
//        // GETパラメータが数字かどうかをチェックする
//        if(!ctype_digit($id)){
//            return redirect('/index')->with('flash_message', __('Photo Update Failure'));
//        }
//        $photo = Photo::find($id);
//        //ファイル取得
//        $imagefile1 = $request->file('pic1');
//        $temp_path1 = $imagefile1->store('public/temp');
//        $filename1 = str_replace('public/temp/', '', $temp_path1);
//        $photo->fill(['pic1' => $filename1]);
//
//        //ファイル取得
//        $imagefile2 = $request->file('pic2');
//        if(!empty($imagefile2)){
//            $temp_path2 = $imagefile2->store('public/temp');
//            $filename2 = str_replace('public/temp/', '', $temp_path2);
//            $photo->fill(['pic2' => $filename2]);
//        }else{
//
//        }
//        //ファイル取得
//        $imagefile3 = $request->file('pic3');
//        if(!empty($imagefile3)) {
//            $temp_path3 = $imagefile3->store('public/temp');
//            $filename3 = str_replace('public/temp/', '', $temp_path3);
//            $photo->fill(['pic3' => $filename3]);
//        }
//        $photo->fill(['comment' => $request->comment]);
//        $photo->fill(['user_id' => Auth::id()]);
//        $request->validate([
//            'pic1' => 'file|required|max:255',
//            'pic2' => 'file|nullable|max:255',
//            'pic3' => 'file|nullable|max:255',
//            'comment' => 'nullable|string|max:255',
//            'user_id' => 'integer',
//        ]);
//
//        $photo->save();
//
//        return redirect('/index')->with('flash_message', __('Photo Update Complete'));
//    }
//    //写真更新画面表示
//    public function edit($id)
//    {
//        // GETパラメータが数字かどうかをチェックする
//        if (!ctype_digit($id)) {
//            return redirect('/index')->with('flash_message', __('Photo Edit Failure'));
//        }
//        $photo = Auth::user()->photos()->find($id);
//        return view('photos.edit', ['photo' => $photo]);
//    }




}
