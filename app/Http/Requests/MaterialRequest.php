<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'name.*' => 'required',
            'unit.*' => 'required',
            'amount' =>['required','numeric','min:0','max:100000000'],
            'quantity' => ['required','numeric','min:0','max:100000000'],
        ];
    }

    public function messages()
    {
        return [
            'name.*' => [
                'required' => 'Tên không được để trống.',
            ],
            'unit.*' => [
                'required' => 'Đơn vị đo không được để trống.',
            ],
            'amount.required' => 'Số lượng không được để trống.',
            'quantity.required' => 'Chất lượng không được để trống.',
            'amount.numeric' => 'Số lượng phải là số',
            'quantity.numeric' => 'Chất lượng phải là số',
            'amount.min' => 'Số lượng phải lớn hơn 0.',
            'amount.max' => 'Số lượng quá lớn vui lòng nhập bé hơn.',
            'quantity.min' => 'Chất lượng phải lớn hơn 0.',
            'quantity.max' => 'Chất lượng quá lớn vui lòng nhập bé hơn.',
        ];
    }
}
