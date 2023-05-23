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
            'mail' => 'required|string|min:5|max:40|unique|email',
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
            'username.required' => '名前を入力してください。',
            'username.string' => '名前は文字列で入力してください。',
            'username.min.max' => '名前は2文字以上、12文字以内で入力してください。',
            'mail.required' => 'メールアドレスを入力してください。',
            'mail.string' => 'メールアドレスは文字列で入力してください。',
            'mail.alpha-num' => 'メールアドレスは英数字で入力してください。',
            'mail.min.max' => 'メールアドレスは5文字以上、40文字以内で入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'password.string' => 'パスワードは文字列で入力してください。',
            'password.alpha-num' => 'パスワードメールアドレスは英数字で入力してください。',
            'password.min.max' => 'パスワードは8文字以上、20文字以内で入力してください。',
            'password_confirmation.required' =>'確認用パスワードを入力してください。',
            'password_confirmation' =>'確認用パスワードはパスワードと同じ文字を入力してください。'
        ];
    }

    @if ($errors->any())
      <div class="alert alert-danger mt-3">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
}
