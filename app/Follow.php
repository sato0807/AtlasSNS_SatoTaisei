<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'following_id', 'followed_id'
    ];

    //多対多のリレーションのため、中間テーブルを作成
    protected $table = 'following_followed';
}
