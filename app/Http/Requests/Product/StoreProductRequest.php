<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:products', 'min:3', 'max:100'],
            'sku' => ['required', 'unique:products', 'min:3', 'max:20'],
            'stock' => ['required', 'numeric', 'min:0', 'max:9999'],
            'price' => ['required', 'numeric', 'min:0', 'max:999999.99'],
            'description' => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'image' => ['required', 'image', 'max:1024', 'mimes:jpeg,jpg,png,webp'],
        ];
    }
}
