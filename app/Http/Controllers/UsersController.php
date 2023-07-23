<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\Http\Requests\ProfileFormRequest;

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

    public function profile(Request $request){
        $user_login = Auth::user()->first();

        return view('users.profile',['user_login' => $user_login]);
    }

    public function update(ProfileFormRequest $request){
        $id = Auth::id();
        $upUsername = $request->input('upUsername');
        $upMail = $request->input('upMail');
        $upPassword = $request->input('upPassword');
        $upBio = $request->input('upBio');
        $upImages_name = $request->file('upImages')->getClientOriginalName();
        $upImages = $request->storeAs('', $upImages_name, 'public');
        // 画像の保存
        // $request->file('name')->('任意のディレクトリ');
        // storeAs('ディスク内のディレクトリー', 'ファイル名', 'ディスク');

        User::where('id', $id)->update([
            'username' => $upUsername,
            'mail' => $upMail,
            'password' => bcrypt($upPassword),
            'bio' => $upBio,
            'images' => $upImages
        ]);

        // 参照
        // https://qiita.com/___yusuke49/items/9f6f64c7f800b8e77e7d
        // https://qiita.com/m-kouki/items/97304527533f7dfb6943

        return redirect('/profile');
    }
}
