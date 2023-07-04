<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'following_id', 'followed_id'
    ];

    // 多対多のリレーション(usersテーブルとusersテーブルと中間テーブルのfollowsテーブル)


}
