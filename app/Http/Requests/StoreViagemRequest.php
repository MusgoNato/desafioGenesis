<?php

namespace App\Http\Requests;

use App\Models\Viagem;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Validator;

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
            'km_inicial' => 'required|numeric|min:0|max:99999',
            'km_final' => 'nullable|numeric|min:0|max:99999|required_with:fim_viagem|gte:km_inicial',
            'inicio_viagem' => 'required|date_format:Y-m-d\TH:i',
            'fim_viagem' => 'nullable|required_with:km_final|date_format:Y-m-d\TH:i|after_or_equal:inicio_viagem',
            'motoristas' => 'required|array|min:1',
            'motoristas.*' => 'exists:motoristas,id',
        ];
    }

    /**
     * Validação para motoristas em andamento na criação de uma viagem 
     * 
     * @param Validator $validator
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) 
        {

            // Se não houver motoristas enviados, não faz nada
            if(!$this->motoristas) 
            {
                return;
            }

            // Se a viagem tem fim definido, é retroativa: não valida motoristas
            if($this->fim_viagem) 
            {
                return;
            }

            // Pega o modelo da viagem que está sendo editada
            $viagemId = $this->route('viagem');
            $viagemAtual = Viagem::with('motoristas')->find($viagemId);
            
            // Extração de todos os IDs dos motoristas relacionada a viagem atual
            $motoristasAtuais = $viagemAtual ? $viagemAtual->motoristas->pluck('id')->toArray() : [];
            
            // Percorre cada um dos motoristas realacionados a viagem atual
            foreach($this->motoristas as $motorista_id) 
            {

                // Ignora motoristas que já estavam na viagem
                if(in_array($motorista_id, $motoristasAtuais)) 
                {
                    continue;
                }

                // Verifica se o motorista está em outra viagem em andamento
                $emAndamento = Viagem::whereHas('motoristas', function ($q) use ($motorista_id)
                {
                    $q->where('motoristas.id', $motorista_id);
                })
                ->whereNull('fim_viagem')
                ->exists();

                if($emAndamento) 
                {
                    $validator->errors()->add(
                        'motoristas',
                        "Os motoristas selecionados já estão em uma viagem em andamento"
                    );
                }
            }

            // Validação veículo caso esteja sendo usado em outra viagem
            if($this->veiculo_id) 
            {
                $veiculoEmAndamento = Viagem::where('veiculo_id', $this->veiculo_id)
                    ->whereNull('fim_viagem')
                    ->exists();

                if($veiculoEmAndamento) 
                {
                    $validator->errors()->add(
                        'veiculo_id',
                        "O veículo selecionado já está em uma viagem em andamento."
                    );
                }
            }
        });
    }

}
