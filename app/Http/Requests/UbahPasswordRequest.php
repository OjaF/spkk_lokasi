<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UbahPasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'repeat_new_password' => 'required|same:new_password|min:8'
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
            'old_password.required' => 'Password Lama Tidak Boleh Kosong',
            'new_password.required' => 'Password Baru tidak boleh kosong',
            'new_password.min' => 'Password Baru minimal 8 karakter',
            'repeat_new_password.min' => 'Ulangi Password Baru minimal 8 karakter',
            'repeat_new_password.required' => 'Ulangi Password Baru tidak boleh kosong',
            'repeat_new_password.same' => 'Password Baru dan Ulangi Password Baru harus sama',
        ];
    }
}
