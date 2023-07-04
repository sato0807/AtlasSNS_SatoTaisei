<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // 1対多のリレーション
    // 子のデータとつなぐ
    public function posts () {
        return $this->hasMany("App\Post");
    }

    // 多対多のリレーション(usersテーブルとusersテーブルと中間テーブルのfollowsテーブル)
    // belongsToMany('関係するモデル', '中間テーブルのテーブル名', '中間テーブル内の自分のID名', '中間テーブル内の相手のID名');
    public function follows(){
        return $this->belongsToMany("App\User", 'follows', 'following_id', 'followed_id');
    }

    // 多対多のリレーション(usersテーブルとusersテーブルと中間テーブルのfollowsテーブル)
    public function followers(){
        return $this->belongsToMany("App\User", 'follows', 'followed_id', 'following_id');
    }

    // フォローしているか
    // boolean:trueかfalseで値を得る
    // Auth::user()->followsテーブルの中->'followed_id'に$user_idがある->かないか（正誤）
    public function isFollowing($user_id){
        return (boolean) $this->follows()->where('followed_id', $user_id)->first();
    }

    // フォローされているか

}
