<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QueryPersonRequest extends FormRequest
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
            'cui' => 'nullable|string',
            'passport' => 'nullable|string',
            'nit' => 'nullable|string',
            'f_name' => 'nullable|string',
            's_name' => 'nullable|string',
            'other_name' => 'nullable|string',
            'f_surname' => 'nullable|string',
            'l_surname' => 'nullable|string',
            'birth_date' => 'nullable|date'
        ];
    }

    public function prepareForValidation() {
        $this->merge($this->only([['cui', 'passport', 'nit', 'f_name', 's_name', 'other_name','f_surname', 'l_surname', 'birth_date']]));
    }
}
