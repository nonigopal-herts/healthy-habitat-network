<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Or your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => [
                'required',
                'email',
                Rule::unique('businesses')->ignore($this->business)
            ],
            'contact_no' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The business name is required',
            'email.required' => 'The email address is required',
            'email.unique' => 'This email is already in use',
            'contact_no.required' => 'Contact number is required',
            'address.required' => 'Address is required',
        ];
    }
}
