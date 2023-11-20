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
        ];
    }


    public function messages()
    {
        return [
            'content.required' => 'ToDoが入力されていません。',
            'content.max' => 'ToDoは :max 文字以内で入力してください。',
        ];
    }
}

// required：入力が必須である
// max:?：入力された値が？文字以内であること