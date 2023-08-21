<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_category.*' => 'required',
            'description.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_category.*' => [
                'required' => 'Trường tên danh mục không được để trống.',
            ],
            'description.*' => [
                'required' => 'Trường mô tả không được để trống.',
            ],
        ];
    }
}
