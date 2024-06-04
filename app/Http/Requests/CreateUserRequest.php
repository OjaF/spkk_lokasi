<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'role' => 'required|in:marketing,finance,stakeholder,admin',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'username.required'=> 'Username harus diisi',
            'username.unique' => 'Username sudah digunakan',
            'role.required' => 'Role harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Minimal panjang password 8 huruf'
        ];
    }
}
