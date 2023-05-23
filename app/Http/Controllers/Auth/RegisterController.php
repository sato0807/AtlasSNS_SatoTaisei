<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            //ポスト送信の時（ゲット送信は無視）

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            //bladeから送られてきた情報を変数に変換

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);
            //Userテーブルに登録する
            //テーブル::create(['カラム名' => 登録したいデータ)];

            $request->session()->put('key', $username);
            return redirect('added');
            //return redirect('URL');
            //↑web.phpのRegisterController@addedの処理を行う
            //ここまでポスト送信で動くコード
        }
        return view('auth.register');
        //return view('ファイル名');
        //↑ファイルの画面表示
        //ゲット送信のみ動くコード
    }

    public function register2(RegisterFormRequest $request){

    }

    public function added(){
        return view('auth.added');
    }
}
