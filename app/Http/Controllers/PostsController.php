<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
//$user = Auth::user();を使うため

use App\Post;
//$user = Post::create();を使うため

class PostsController extends Controller
{

    public function index(){
        return view('posts.index');
    }

    public function store(Request $request){
        $user = Auth::user();
        // dd($user->id); 中身の確認とどこでエラーが出ているか見分けられる
        //現在認証しているユーザーを取得
        $post = $request->input('newPost');
        //input()の中はFormタグのname属性（第2引数）
        Post::create(['user_id' => $user->id,'post' => $post]);
        //'Post'はテーブル名、'post'はカラム名
        return redirect('/top');
    }
}
