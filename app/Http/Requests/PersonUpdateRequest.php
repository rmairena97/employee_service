<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonUpdateRequest extends FormRequest
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
            //
            'id' => 'required|exists:people,id',
            'f_name' => 'nullable|string',
            's_name' => 'nullable|string',
            'other_name' => 'nullable|string',
            'f_surname' => 'nullable|string',
            'l_surname' => 'nullable|string',
            'birth_date' => 'nullable|date'
        ];
    }
}
