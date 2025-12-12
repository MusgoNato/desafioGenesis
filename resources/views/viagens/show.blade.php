<x-layout>
    <div class="max-w-3xl mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6 hover:shadow-xl transition">

            <!-- Cabeçalho -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">{{ $viagem->nome_viagem }}</h2>
                <div class="flex gap-2">
                    <a href="{{ route('viagens.edit', $viagem->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('viagens.destroy', $viagem->id) }}" method="POST" 
                          onsubmit="return confirm('Tem certeza que deseja excluir esta viagem?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-error">Deletar</button>
                    </form>
                </div>
            </div>

            <!-- Informações principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                
                <!-- Motoristas -->
                <div>
                    <span class="font-semibold">Motoristas:</span>
                    <div class="mt-1 flex flex-wrap gap-2">
                        @foreach ($viagem->motoristas as $motorista)
                            <span class="badge bg-gray-200 font-medium">{{ strtok($motorista->nome, ' ') }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Veículo -->
                <div>
                    <span class="font-semibold">Veículo:</span>
                    <div class="mt-1">{{ $viagem->veiculo->modelo }}</div>
                </div>

                <!-- KM -->
                <div>
                    <span class="font-semibold">KM Inicial / Final:</span>
                    <div class="mt-1">
                        {{ $viagem->km_inicial }}
                        @if($viagem->km_final)
                            → <strong>{{ $viagem->km_final }}</strong>
                        @endif
                    </div>
                </div>

                <!-- Datas -->
                <div>
                    <span class="font-semibold">Início da viagem:</span>
                    <div class="mt-1">{{ \Carbon\Carbon::parse($viagem->inicio_viagem)->format('d/m/Y H:i') }}</div>
                </div>

                <div>
                    <span class="font-semibold">Fim da viagem:</span>
                    <div class="mt-1">
                        @if($viagem->fim_viagem)
                            {{ \Carbon\Carbon::parse($viagem->fim_viagem)->format('d/m/Y H:i') }}
                        @else
                            —
                        @endif
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <span class="font-semibold">Status:</span>
                    <div class="mt-1">
                        @if($viagem->fim_viagem)
                            <span class="badge badge-success">Finalizada</span>
                        @else
                            <span class="badge badge-warning">Em andamento</span>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Observações -->
            @if($viagem->observacoes)
                <div class="mt-4 text-gray-600">
                    <span class="font-semibold">Observações:</span>
                    <p class="mt-1">{{ $viagem->observacoes }}</p>
                </div>
            @endif

        </div>
    </div>
</x-layout>
