<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'post'
    ];
    //値が編集しても良いカラムを指定する

    public function user () {
        return $this->belongsTo("App\User");
    }
    //リレーション
    //親のデータとつなぐ(postsからusersへ)
    // なるべくテーブル名と一致させる
    // ただし、belongsTo()を用いる際のメソッド名は単数
}
