<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|min:5|max:40|unique:users,mail,Auth::id();,id|email',
            // |unique:テーブル名,カラム名,除外したい値,第3引数を適用するカラム名|
            'password' => 'string|alpha-num|min:8|max:20',
            'password_confirmation' => 'same:password',
            'bio' => 'max:150',
            'images' => 'mimes:jpg,png,bmp,gif,svg'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'username' => '名前',
            'mail' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => '確認用パスワード',
            'bio' => '自己紹介文',
            'images' => 'アイコン用の画像'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => ':attributeを入力してください。',
            'username.string' => ':attributeは文字列で入力してください。',
            'username.min' => ':attributeは2文字以上で入力してください。',
            'username.max' => ':attributeは12文字以内で入力してください。',
            'mail.required' => ':attributeを入力してください。',
            'mail.string' => ':attributeは文字列で入力してください。',
            'mail.min' => ':attributeは5文字以上で入力してください。',
            'mail.max' => ':attributeは40文字以内で入力してください。',
            'mail.unique' => '登録済み:attributeは使用しないでください。',
            'mail.email' => ':attributeの形式で入力してください。',
            'password.string' => ':attributeは文字列で入力してください。',
            'password.alpha-num' => ':attributeは英数字で入力してください。',
            'password.min' => ':attributeは8文字以上で入力してください。',
            'password.max' => ':attributeは20文字以内で入力してください。',
            'password_confirmation.same:password' =>':attributeはパスワードと同じ文字を入力してください。',
            'bio.max' => ':attributeは150文字以内で入力してください。',
            'images.mimes' => ':attributeはjpg,png,bmp,gif,svgのいずれかの形式でアップロードしてください。'
        ];
    }

}
