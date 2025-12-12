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
            'veiculo_id' => 'required|exists:veiculos,id',
            'km_inicial' => 'required|numeric',
            'km_final' => 'nullable|numeric',
            'inicio_viagem' => 'required|date_format:Y-m-d\TH:i',
            'fim_viagem' => 'nullable|date_format:Y-m-d\TH:i|after_or_equal:inicio_viagem',
            'motoristas' => 'required|array|min:1',
            'motoristas.*' => 'exists:motoristas,id',
        ];
    }
}
