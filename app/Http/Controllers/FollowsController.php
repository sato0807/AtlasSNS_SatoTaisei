<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;

class FollowsController extends Controller
{
    // 「フォローする」の処理
    public function follow($id){
        // Followテーブルに下記を登録
        Follow::create([
            'following_id' => Auth::id(),
            // search.blade.phpからIDを取得→web.phpを介してIDを送信→フォローされるIDを取得する
            'followed_id' => $id
        ]);
        return redirect('/search');
    }

    // 「フォロー解除」の処理
    public function unfollow($id){
        // 'following_id'と'followed_id'に値が入っていればレコード削除
        Follow::where('following_id', Auth::id())->where('followed_id', $id)->delete();
        return redirect('/search');
    }

}
