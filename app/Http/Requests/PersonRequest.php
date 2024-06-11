<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonRequest extends FormRequest
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
            'cui' => 'sometimes|unique:people,cui',
            'passport' => 'sometimes|unique:people,passport',
            'nit' => 'sometimes|unique:people,nit',
            'f_name' => 'required',
            's_name' => 'required',
            'f_surname' => 'required',
            'l_surname' => 'required',
            'house_surname' => 'sometimes|string',
            'igss' => 'sometimes|string',
            'birth_date' => 'required| date_format:m/d/Y',
            'children_count' => 'required',
            'marital_state_id' => 'required',
            'gender_id' => 'required',
            'linguistic_community_id' => 'required',
            'ethnicity_id' => 'required'
        ];
    }
}
