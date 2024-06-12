<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationPersonRequest extends FormRequest
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
            'person_id'=> 'required|exists:people,id',
            'academic_level_id' => 'required|numeric',
            'academic_degree_id' => 'nullable|numeric'
        ];
    }
}
