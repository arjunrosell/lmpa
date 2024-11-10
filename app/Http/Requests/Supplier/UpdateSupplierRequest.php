<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:50'],
            'phone' => ['required', 'regex:/^[0-9]+$/', 'digits:11',],
            'email' =>  ['nullable', 'email:rfc,dns', 'max:50', Rule::unique('suppliers')->ignore($this->supplier->id)],
            'address' => ['required', 'string', 'min:3', 'max:100'],
        ];
    }
}
