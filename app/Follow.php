<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'following_id', 'followed_id'
    ];

    // 多対多のリレーション
    public function followers(){
        return $this->belongsToMany("App\User");
    }

}
