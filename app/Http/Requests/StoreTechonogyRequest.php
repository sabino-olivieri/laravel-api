<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechonogyRequest extends FormRequest
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
            'name' => 'required|unique:technologies,name|min:3',
            'color' => 'nullable|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.unique' => 'Esiste già questa tecnologia',
            'name.min' => 'Il nome deve contenere almeno 3 caratteri',
            'color.min' => 'Il colore deve avere almeno 3 caratteri'
        ];
    }
}
