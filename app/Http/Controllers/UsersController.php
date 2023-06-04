<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

class UsersController extends Controller
{

    public function search(Request $request){
        // 現在認証しているユーザー名を取得
        $user = Auth::user();
        $search = $request->input('keyword');
        // 現在認証しているユーザー名以外を取得し、あいまい検索をかける
        // ->get();かfirst();を入れることでデータを取得し、表示ができる
        if (isset($search)) {
            $username = User::where('username', '!=', $user)->where('username', 'LIKE', "%$search%")->get();
        } else {
            $username = User::where('username', '!=', $user)->get();
        }
        return view('users.search',['username' => $username, 'search' => $search]);
    }
}
