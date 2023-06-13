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
    // public function 変数(){
    //     return $this->belongToMany('モデル名', 'テーブル名', 'リレーションを定義しているモデルの外部キー名', '結合するモデルの外部キー名');
    // }
    // フォロワー→フォロー
    public function followed(){
        return $this->belongToMany('App\User', 'following_followed', 'followed_id', 'following_id');
    }

    // フォロー→フォロワー
    public function following(){
        return $this->belongToMany('App\User', 'following_followed', 'following_id', 'followed_id');
    }
}
