<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\PostsController;

class PostsFormRequest extends FormRequest
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
            'post' => 'required|min:1|max:150'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'post' => '投稿'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'post.min.max' => ':attributeは1文字以上、150文字以下で入力してください。'
        ];
    }
}
