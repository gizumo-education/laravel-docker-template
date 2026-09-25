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
            'content' => 'required|max:255',
            //キー：入力欄のname属性　バリュー：バリデーションルール
            //required : 入力を必須にする
            //max:○○ : ○○文字まで入力OK
        ];
    }

    public function messages()
    {
        return [
            // 入力欄のname属性.ルール => メッセージ
            'content.required' => 'ToDoが入力されていません。',
            'content.max' => 'ToDoは :max 文字以内で入力してください。',
        ];
    }
}
