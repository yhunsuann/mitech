<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistributorRequest extends FormRequest
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
            'name' => 'required',
            'location' => 'required',
            'city' => 'required',
            'region' => 'required', 
            'latitude' => 'required',
            'longitude' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'location.required' => 'Địa chỉ không được để trống',
            'city.required' => 'Tỉnh/thành phố không được để trống',
            'region.required' => 'Quận/huyện  không được để trống',
            'latitude.required' => 'Kinh độ không được để trống',
            'longitude.required' => 'Vỹ độ không được để trống',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
        ];
    }
}
