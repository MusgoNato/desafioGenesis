<?php

namespace App\Http\Requests;

use App\Models\Viagem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateViagemRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nome_viagem' => 'required|string|max:100',
            'veiculo_id' => 'nullable|exists:veiculos,id',
            'km_inicial' => 'required|integer|min:0|max:99999',
            'km_final' => 'required|integer|min:0|max:99999|gte:km_inicial',
            'inicio_viagem' => 'required|date_format:Y-m-d\TH:i',
            'fim_viagem' => 'required|date_format:Y-m-d\TH:i|after_or_equal:inicio_viagem',
            'motoristas' => 'nullable|array|min:1',
            'motoristas.*' => 'exists:motoristas,id',
        ];
    }

    /**
     * Validação customizada para motoristas em viagens em andamento.
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) 
        {

            // Se não houver motoristas enviados, não faz nada
            if (!$this->motoristas) 
            {
                return;
            }

            // Se a viagem tem fim definido, é retroativa: não valida motoristas
            if ($this->fim_viagem)
            {
                return;
            }

            // Pega o modelo da viagem que está sendo editada
            $viagemId = $this->route('viagem');
            $viagemAtual = Viagem::with('motoristas')->find($viagemId);

            $motoristasAtuais = $viagemAtual ? $viagemAtual->motoristas->pluck('id')->toArray() : [];

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
                
                // Se existir motoristas em viagens em andamento, retorna mensagem personalizada
                if($emAndamento) 
                {
                    $validator->errors()->add(
                        'motoristas',
                        "Os motoristas selecionados já estão em uma viagem em andamento"
                    );
                }
            }
        });
    }
}
