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
            // 'name属性' => 'バリデーションの条件'
            'newPost' => 'required|min:1|max:150'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'newPost' => '投稿'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'newPost.required' => ':attributeを入力してください。',
            'newPost.min' => ':attributeは1文字以上で入力してください。',
            'newPost.max' => ':attributeは150文字以下で入力してください。'
        ];
    }
}
