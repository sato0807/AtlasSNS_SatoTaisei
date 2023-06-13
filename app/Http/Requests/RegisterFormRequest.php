<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Auth\RegisterController;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // 基本「true」
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
            'mail' => 'required|string|min:5|max:40|unique:users,mail|email',
            'password' => 'required|string|alpha-num|min:8|max:20',
            'password_confirmation' =>'required|same:password'
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
            'password_confirmation' =>'確認用パスワード'
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
            'mail.alpha-num' => ':attributeは英数字で入力してください。',
            'mail.min' => ':attributeは5文字以上で入力してください。',
            'mail.max' => ':attributeは40文字以内で入力してください。',
            'password.required' => ':attributeを入力してください。',
            'password.string' => ':attributeは文字列で入力してください。',
            'password.alpha-num' => ':attributeは英数字で入力してください。',
            'password.min' => ':attributeは8文字以上で入力してください。',
            'password.max' => ':attributeは20文字以内で入力してください。',
            'password_confirmation.required' =>':attributeを入力してください。',
            'password_confirmation.same:password' =>':attributeはパスワードと同じ文字を入力してください。'
        ];
    }

}
