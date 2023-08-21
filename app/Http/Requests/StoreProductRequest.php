<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MeasurementRule;

class StoreProductRequest extends FormRequest
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
        $rules = [
            'name.*' => 'required',
            'price.*' => ['required', 'numeric', 'min:0', 'max:10000000000'],
            'thickness.*' => ['required', 'numeric', 'min:0', 'max:10000000000'],
            'thickness_unit.*' => 'required'
        ];

        if ($this->input('category_id') != 13) {
            $rules['width.*'] = ['required', 'numeric', 'min:0', 'max:100000000'];
            $rules['height.*'] = ['required', 'numeric', 'min:0', 'max:100000000'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.*' => [
                'required' => 'Tên không được để trống.',
            ],
            'price.*' => [
                'required' => 'Giá không được để trống.',
                'numeric' => 'Giá phải là số.',
                'min' => 'Giá phải lớn hơn 0.',
                'max' => 'Giá quá lớn vui lòng nhập bé hơn.',
            ],
            'thickness.*' => [
                'required' => 'Độ dày hoặc trọng lượng không được để trống.',
                'numeric' => 'Độ dày hoặc trọng lượng phải là số.',
                'min' => 'Độ dày hoặc trọng lượng phải lớn hơn 0.',
                'max' => 'Độ dày hoặc trọng lượng quá lớn vui lòng nhập bé hơn.',
            ],
            'width.*' => [
                'required' => 'Chiều dài không được để trống.',
                'numeric' => 'Chiều dài phải là số.',
                'min' => 'Chiều dài phải lớn hơn 0.',
                'max' => 'Chiều dài quá lớn vui lòng nhập bé hơn.',
            ],
            'height.*' => [
                'required' => 'Chiều cao không được để trống.',
                'numeric' => 'Chiều cao phải là số.',
                'min' => 'Chiều cao phải lớn hơn 0.',
                'max' => 'Chiều cao quá lớn vui lòng nhập bé hơn.',
            ],
            'thickness_unit.*' => [
                'required' => 'Đơn vị không được để trống.',
            ],
        ];
    }
}
