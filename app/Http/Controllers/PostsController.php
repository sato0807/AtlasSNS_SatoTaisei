<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
//$user = Auth::user();を使うため

use App\Post;
//$user = Post::create();を使うため

use App\User;

use App\Http\Requests\PostsFormRequest;

class PostsController extends Controller
{

    public function index(){
        $user_id = Auth::id();
        $posts = Post::get();
        //Post.phpのデータを$postsに変換
        User::with("posts");
        //リレーション
        //親から子へデータを流す
        return view('posts.index',['posts'=>$posts, 'user_id'=>$user_id]);
        //['受け渡し先の変数'=>$受け渡す変数]
    }

    public function store(PostsFormRequest $request){
        $user_id = Auth::id();
        // dd($user->id); 中身の確認とどこでエラーが出ているか見分けられる
        //RequestはFormで送信された情報を取得する際使用
        //現在認証しているユーザーを取得
        $post = $request->input('newPost');
        //input()の中はFormタグのname属性（第2引数）
        Post::create(['user_id' => $user_id,'post' => $post]);
        //'Post'はテーブル名、'post'はカラム名
        return redirect('/top');
    }

    public function update(Request $request){
        $post = $request->input('upPost');
        $id = $request->input('up_id');
        Post::where('id', $id)->update(['post' => $post]);
        return redirect('/top');
    }

    public function delete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function followList(){
        $follows = Auth::user()->follows()->get();
        $posts = Post::with('user')->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
        // with('テーブル') リレーションしたテーブルの情報を取得
        // whereIn('テーブル名.カラム名', [カラム名の値として期待されるもの])
        // whereIn('user_idの値が', ログインユーザー->フォローしている(Post.php 自分がfollowing_idにあるときのレコード)->followed_idと同じ値)
        // pluck('バリュー', 'キー') コレクション型のデータから1つの情報だけをそれぞれ取得したい際に使う
        // latest()->get() 最新のデータから取得
        // dd($posts);
        return view('follows.followList', ['follows' => $follows, 'posts' => $posts]);
    }

    public function followerList(){
        $followers = Auth::user()->followers()->get();
        $posts = Post::with('user')->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest()->get();
        return view('follows.followerList', ['followers' => $followers, 'posts' => $posts]);
    }
}
