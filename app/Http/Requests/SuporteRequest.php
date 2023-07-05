<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuporteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'assunto' => 'required|min:3|max:255|unique:suportes',
            'conteudo' => [
                'required',
                'min:3',
                'max:100000'
            ]
        ];
    }
}
