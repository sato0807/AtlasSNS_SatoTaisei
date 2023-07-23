<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

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
    public function rules(Request $request)
    {
        $user_id = Auth::id();

        return [
            'upUsername' => 'required|string|min:2|max:12',
            'upMail' => 'required|string|min:5|max:40|unique:users,mail,$user_id,id|email',
            // |unique:テーブル名,カラム名,対象外にしたいデータがあるレコードの主キー,第3引数のカラム名|
            'upPassword' => 'nullable|string|alpha-num|min:8|max:20',
            'upPassword_confirmation' => 'same:password',
            'upBio' => 'max:150',
            'upImages' => 'mimes:jpg,png,bmp,gif,svg'
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
            'upUsername' => '名前',
            'upMail' => 'メールアドレス',
            'upPassword' => 'パスワード',
            'upPassword_confirmation' => '確認用パスワード',
            'upBio' => '自己紹介文',
            'upImages' => 'アイコン用の画像'
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
            'upUsername.required' => ':attributeを入力してください。',
            'upUsername.string' => ':attributeは文字列で入力してください。',
            'upUsername.min' => ':attributeは2文字以上で入力してください。',
            'upUsername.max' => ':attributeは12文字以内で入力してください。',
            'upMail.required' => ':attributeを入力してください。',
            'upMail.string' => ':attributeは文字列で入力してください。',
            'upMail.min' => ':attributeは5文字以上で入力してください。',
            'upMail.max' => ':attributeは40文字以内で入力してください。',
            'upMail.unique' => '登録済み:attributeは使用しないでください。',
            'upMail.email' => ':attributeの形式で入力してください。',
            'upPassword.string' => ':attributeは文字列で入力してください。',
            'upPassword.alpha-num' => ':attributeは英数字で入力してください。',
            'upPassword.min' => ':attributeは8文字以上で入力してください。',
            'upPassword.max' => ':attributeは20文字以内で入力してください。',
            'upPassword_confirmation.same:password' =>':attributeはパスワードと同じ文字を入力してください。',
            'upBio.max' => ':attributeは150文字以内で入力してください。',
            'upImages.mimes' => ':attributeはjpg,png,bmp,gif,svgのいずれかの形式でアップロードしてください。'
        ];
    }

}
