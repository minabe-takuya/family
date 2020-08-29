<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //プロフィール編集表示
    public function edit($id)
    {
        // GETパラメータが数字かどうかをチェックする
        if (!ctype_digit($id)) {
            return redirect('/mypage')->with('flash_message', __('User Edit Failure'));
        }
        //ログインしている1つのユーザー情報を取得
        $user = Auth::user();
        return view('auth.edit', ['user' => $user]);
    }
    //イベントアップデート
    public function update(Request $request, $id)
    {
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message', __('User Update Failure'));
        }
        $user = Auth::user($id);
        $users = Auth::user();
        if($request->password !== $users->password){
            $user->fill(['password' => Hash::make($request->password)]);
        }
        else{
            $user->fill(['password' => $request->password]);
        }
        $user->fill(['name' => $request->name]);
        $user->fill(['allergies' => $request->allergies]);
        $user->fill(['pollen' => $request->pollen]);
        $user->fill(['hobby' => $request->hobby]);
        $user->save();

        return redirect('/mypage')->with('flash_message', __('User Update Complete'));
    }
}
