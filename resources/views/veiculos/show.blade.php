<x-layout>
    <div class="max-w-2xl mx-auto p-6">

        <!-- Cabeçalho -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <!-- Botão Voltar -->
                <a href="{{ route('veiculos.index') }}" class="btn bg-gray-300 hover:bg-gray-400 btn-sm flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Voltar
                </a>
                <h1 class="text-2xl font-semibold">Detalhes do Veículo</h1>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-sm btn-ghost p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>
                <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" 
                        onsubmit="return confirm('Tem certeza que deseja excluir este veículo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-ghost p-1 hover:bg-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                            <line x1="10" x2="10" y1="11" y2="17"></line>
                            <line x1="14" x2="14" y1="11" y2="17"></line>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Card de informações -->
        <div class="bg-white shadow rounded-lg p-6 divide-y divide-gray-200">

            <!-- Dados principais -->
            <div class="pb-4">
                <h2 class="text-xl font-semibold mb-3">Informações Básicas</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-gray-600 font-medium">Modelo</h3>
                        <p class="text-gray-800">{{ $veiculo->modelo }}</p>
                    </div>
                    <div>
                        <h3 class="text-gray-600 font-medium">Ano</h3>
                        <p class="text-gray-800">{{ $veiculo->ano }}</p>
                    </div>
                    <div>
                        <h3 class="text-gray-600 font-medium">Placa</h3>
                        <p class="text-gray-800">{{ $veiculo->placa }}</p>
                    </div>
                </div>
            </div>

            <!-- Dados adicionais -->
            <div class="pt-4">
                <h2 class="text-xl font-semibold mb-3">Dados Adicionais</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-gray-600 font-medium">Data de Aquisição</h3>
                        <p class="text-gray-800">{{ \Carbon\Carbon::parse($veiculo->data_aquisicao)->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <h3 class="text-gray-600 font-medium">Kms Rodados</h3>
                        <p class="text-gray-800">{{ number_format($veiculo->kms_rodados, 0, ',', '.') }} km</p>
                    </div>
                    <div class="sm:col-span-2">
                        <h3 class="text-gray-600 font-medium">Renavam</h3>
                        <p class="text-gray-800">{{ $veiculo->renavam }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
