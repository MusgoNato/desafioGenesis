<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreViagemRequest extends FormRequest
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
            'nome_viagem' => 'required|string|max:100',
            'veiculo_id' => 'nullable|exists:veiculos,id',
            'km_inicial' => 'required|numeric',
            'inicio_viagem' => 'required|date_format:Y-m-d\TH:i',
            'motoristas' => 'nullable|array',
            'motoristas.*' => 'exists:motoristas,id',
        ];
    }
}
