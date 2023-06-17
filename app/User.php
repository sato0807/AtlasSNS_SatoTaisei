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

    // 多対多のリレーション
    public function follows(){
        return $this->belongsToMany("App\Follow");
    }

    // フォローする
    // public function follow(Int $user_id){
    //     return $this->follows()->attach($user_id);
    // }

    // フォロー解除する
    // public function unfollow(Int $user_id){
    //     return $this->follows()->detach($user_id);
    // }

    // フォローしているか
    public function isFollowing(Int $user_id){
        return (boolean) $this->follows()->where('followed_id', $user_id)->first();
    }

    // フォローされているか
    public function isFollowed(Int $user_id){
        return (boolean) $this->followers()->where('following_id', $user_id)->first();
    }

}
