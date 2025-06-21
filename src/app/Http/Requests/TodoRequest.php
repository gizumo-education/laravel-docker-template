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
        // リクエストを受け付けるためtrueに変更
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
            // 入力可能な文字数の設定（バリデーション）
            'content' => 'required|max:255',
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
