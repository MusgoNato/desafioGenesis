<x-layout></x-layout>

<!-- Cadastro de veículo -->
<div class="max-w-2xl mx-auto">
    <div class="card">
        <div class="card-body">
            <a class="btn btn-primary" href={{ route('veiculos.create') }}>Cadastrar veículo</a>
        </div>
    </div>
</div>

<!-- Visualização dos veiculos cadastrados -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
    @if (isset($veiculos) && count($veiculos) > 0)
        @foreach ($veiculos as $veiculo)
            <div class="bg-white shadow-lg rounded-xl p-5 border border-gray-200 hover:shadow-xl transition">
                <h2 class="text-xl font-bold text-gray-800 mb-3">{{ $veiculo->modelo }}</h2>

                <div class="space-y-1 text-gray-700">
                    <p><span class="font-semibold">Ano:</span> {{ $veiculo->ano }}</p>
                    <p><span class="font-semibold">Data de aquisição:</span> {{ $veiculo->data_aquisicao }}</p>
                    <p><span class="font-semibold">KM rodados:</span> {{ $veiculo->kms_rodados }}</p>
                    <p><span class="font-semibold">Placa:</span> {{ $veiculo->placa }}</p>
                    <p><span class="font-semibold">Renavam:</span> {{ $veiculo->renavam }}</p>
                    <p class="text-sm text-gray-500 mt-3">
                        {{ $veiculo->created_at->diffForHumans() }}
                    </p>
                </div>

                <div class="flex justify-end gap-4">
                    <a class="btn btn-primary" href="#">Editar</a>
                    <a class="btn bg-red-500" href="#">Deletar</a>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center text-gray-600 col-span-full">Nenhum veículo cadastrado</p>
    @endif
</div>
