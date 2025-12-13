<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MotoristaRequest extends FormRequest
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
        $id = $this->route('motorista');
        
        return [
            'nome' => 'required|string|max:255',
            'data_nascimento' => [
                'required',
                'date',
                
                // Cálculo para validação de maiores de 18 
                'before_or_equal:' . now()->subYears(18)->format('Y-m-d'), 
            ],
            'numero_cnh' => [
                'required',

                // Deve conter exatamente 11 dígitos
                'regex:/^\d{11}$/',

                // Número da CNH deve ser único na tabela, ignorando o registro atual
                Rule::unique('motoristas', 'numero_cnh')->ignore($id),
            ],
        ];
    }
}
