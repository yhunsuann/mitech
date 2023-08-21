<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'document_file' => 'required|file'
        ];
    }

    public function messages()
    {
        return [
            'name.*' => [
                'required' => 'Tên không được để trống.',
            ],
            'document_file.required' => 'Tài liệu không được để trống',
            'document_file.file' => 'Tài liệu không đúng định dạng',
        ];
    }
}
