<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;

class FollowsController extends Controller
{
    //
    public function follow(User $user){
        $follow = Follow::create([
            // フォローする人のIDを取得=当然認証ユーザー
            'following_id' => \Auth::user()->id,
            // フォローされる相手のIDを取得
            'followed_id' => $user->id
        ]);
        // フォローされているユーザーの数をcountして取得
        $followCount = count(Follow::where('followed_id', $user->id)->get());

        // 処理したデータをJavaScriptへ渡す
        // return response()->json(['受け渡し先の変数' => $受け渡す変数]);
        return response()->json(['followCount' => $followCount]);
    }

    // Followインスタンスを取得して削除
    public function unfollow(User $user){
        $follow = Follow::where('following_id', \Auth::user()->id)->first();
        $follow->delete();
        $followCount = count(Follow::where('followed_id', $user->id)->get());

        return response()->json(['followCount' => $followCount]);
    }
}
