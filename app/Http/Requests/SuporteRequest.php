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

        $rules = [
            'assunto' => 'required|min:3|max:255|unique:suportes',
            'conteudo' => [
                'required',
                'min:3',
                'max:100000'
            ]
            ];
        
        if($this->method() == 'PUT'){
            $rules['assunto'] = [
                'required',
                'min:3',
                'max:255',
                //'unique:suportes,assunto,{$this->id},id'
                Role::unique('suportes')->ignore($this->id)
            ];
        }

        return $rules;
    }
}
