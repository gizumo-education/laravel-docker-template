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
        // return false;
        // 修正
        // ここがfalseのままだと全てのリクエストを受け付けなくなってしまうので注意
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
            // バリデーションのルールを追加
            // 連想配列のキーがリクエストパラメータ名を表す。その値がバリゲーションルール。
            'content' => 'required|max:255',
            // required:入力必須であること
            // max:?:入力された値が？文字以内であること
        ];
    }
    // エラーメッセージの追加
    public function messages()
    {
        return [
            'content.required' => 'ToDoが入力されていません。',
            'content.max' => 'ToDoは :max 文字以内で入力してください。',
        ];
    }
}
