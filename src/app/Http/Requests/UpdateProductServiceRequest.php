<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductServiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'product_service_subcategory_id' => 'required|exists:product_service_subcategories,id',
            'price_tag_id' => 'required|exists:price_tags,id',
            'size' => 'nullable|string|max:100',
            'quantity' => 'nullable|integer|min:0',
            'health_benefits' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//            'certificates' => 'nullable|array',
//            'certificates.*' => 'string|max:255',
            'price' => 'required|numeric|min:0|max:999999.99',
        ];
    }
}
