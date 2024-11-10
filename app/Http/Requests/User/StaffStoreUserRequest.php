<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StaffStoreUserRequest extends FormRequest
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
        // Retrieve the "client" role ID from the database
        $clientRoleId = DB::table('roles')->where('name', 'client')->value('id');

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:50', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', Password::min(6)],
            'roles' => ['required', 'array'],
            'roles.*' => ['in:' . $clientRoleId], // Ensure only the "client" role ID is allowed
        ];
    }
}
