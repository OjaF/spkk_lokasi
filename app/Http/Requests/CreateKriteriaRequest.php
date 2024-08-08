<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateKriteriaRequest extends FormRequest
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
            'nama' => 'required|string',
            'bobot' => 'required|numeric|between:0,100',
            'role' => 'required|string',
            'atribut' => 'required|string|in:cost,benefit',
            'kode' => 'required|string',
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
            'kode.required' => 'Kode kriteria harus diisi',
            'nama.required' => 'Nama kriteria harus diisi',
            'nama.string' => 'Nama kriteria harus berupa string',
            'bobot.required' => 'Bobot kriteria harus diisi',
            'bobot.numeric' => 'Bobot kriteria harus berupa angka',
            'bobot.between' => 'Bobot kriteria harus diantara 0 sampai 1',
            'role.required' => 'Role kriteria harus diisi',
        ];
    }
}
