<?php

namespace App\Http\Requests\Client;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
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
            'target' => 'required',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'reason' => 'required'
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
            'target.required' => __('validate.target_required'),
            'name.required' => __('validate.name_required'),
            'address.required' => __('validate.address_required'),
            'email.required' => __('validate.email_required'),
            'email.email' => __('validate.email_email'),
            'reason.required' => __('validate.reason_required')
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
