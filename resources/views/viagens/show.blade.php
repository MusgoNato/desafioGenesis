<x-layout>
    <div class="max-w-3xl mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-6 hover:shadow-xl transition">

            <!-- Cabeçalho -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">{{ $viagem->nome_viagem }}</h2>
                <div class="flex gap-2">
                    <a href="{{ route('viagens.edit', $viagem->id) }}" class="btn btn-sm btn-ghost p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg></a>
                    <form action="{{ route('viagens.destroy', $viagem->id) }}" method="POST" 
                          onsubmit="return confirm('Tem certeza que deseja excluir esta viagem?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-ghost p-1 hover:bg-red-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg></button>
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
        </div>
    </div>
</x-layout>
