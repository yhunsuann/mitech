<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'question.*' => 'required',
            'answer.*' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'question.*' => [
                'required' => 'Câu hỏi không được để trống.',
            ],
            'answer.*' => [
                'required' => 'Câu trả lời không được để trống.',
            ],
        ];
    }
}
