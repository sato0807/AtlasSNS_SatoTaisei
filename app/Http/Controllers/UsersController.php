<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

class UsersController extends Controller
{

    public function search(Request $request){
        // 現在認証しているユーザー名を取得
        $user_login = Auth::user();
        $search = $request->input('keyword');
        // 現在認証しているユーザー名以外を取得し、あいまい検索をかける
        // ->get();かfirst();を入れることでそのレコード（行）のデータを取得し、表示ができる
        if (isset($search)) {
            $users = User::where('username', '!=', $user_login)->where('username', 'LIKE', "%$search%")->get();
        } else {
            $users = User::where('username', '!=', $user_login)->get();
        }
        return view('users.search',['users' => $users, 'search' => $search]);
    }
}
