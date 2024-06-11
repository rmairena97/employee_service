<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonDisabilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


//$table->integer('person_id');
//$table->foreign('person_id')->references('id')->on('people');
//$table->integer('disabled_id');
//$table->integer('disabled_level_id');
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'person_id' => 'required|exists:people,id',
            'disabled_id' => 'required|numeric',
            'disabled_level_id' => 'required|numeric',
        ];
    }
}
