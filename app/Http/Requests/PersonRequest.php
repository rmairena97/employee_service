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
            'document' => 'required|in:cui,passport,nit',
            'cui' => 'required_if:document,cui|unique:people,cui',
            'passport' => 'required_if:document,passport|unique:people,passport',
            'nit' => 'required_if:document,nit|unique:people,nit',
            'f_name' => 'required',
            's_name' => 'required',
            'f_surname' => 'required',
            'l_surname' => 'required',
            'house_surname' => 'nullable|string',
            'igss' => 'nullable|string',
            'birth_date' => 'required|date_format:m/d/Y',
            'children_count' => 'required',
            'marital_state_id' => 'required',
            'gender_id' => 'required',
            'linguistic_community_id' => 'required',
            'ethnicity_id' => 'required'
        ];
    }
}
