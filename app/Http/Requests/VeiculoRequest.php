<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
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
            'modelo' => 'required|string|max:255',
            'ano' => 'required|integer|digits:4|min:1900|max:2099',
            'data_aquisicao' => 'required|date',
            'kms_rodados' => 'required|integer|min:0',
            'renavam' => 'required|digits:11|unique:veiculos,renavam',
            'placa' => [
                'required',
                'unique:veiculos,placa',

                // Validações para as placas antigas e atuais do mercosul
                'regex:/^([A-Z]{3}-?[0-9]{4}|[A-Z]{3}[0-9][A-Z][0-9]{2})$/i'
            ],
        ];
    }
}
