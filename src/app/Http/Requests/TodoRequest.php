<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 修正
        // ここがfalseのままだと全てのリクエストを受け付けなくなってしまうので注意
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //バリデーションルール
    public function rules()
    {
        return [
            'content' => 'required|max:255',
            //required：入力が必須である
            //max:?：入力された値が？文字以内であること
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'ToDoが入力されていません。',
            'content.max' => 'ToDoは :max 文字以内で入力してください',
        ];
    }
}