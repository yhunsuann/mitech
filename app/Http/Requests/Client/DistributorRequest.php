<?php

namespace App\Http\Requests\Client;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'full_name' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            'email_address' => 'required|email',
            'distributor_phone' => 'required',
            'position' => 'required',
            'city' => 'required',
            'district' => 'required'
        ];
    }
    
    /**
     * messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'position.required' => __('validate.position_required'),
            'full_name.required' => __('validate.name_required'),
            'address_1.required' => __('validate.address_required'),
            'address_2.required' => __('validate.address_required'),
            'email_address.required' => __('validate.email_address_required'),
            'distributor_phone.required' => __('validate.phone_number_required'),
            'city.required' => __('validate.city_required'),
            'district.required' => __('validate.dictrict_required')
        ];
    }
    
    /**
     * failedValidation
     *
     * @param  mixed $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new HttpResponseException(response()->json(['error' => $error], 400));
    }
}
