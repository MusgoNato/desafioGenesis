<x-layout>
    <div class="max-w-7xl mx-auto p-6">
        <!-- Cabeçalho -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Veículos</h1>
            <a href="{{ route('veiculos.create') }}" class="btn btn-primary">Cadastrar veículo</a>
        </div>

        <!-- Tabela -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">

            @if($veiculos->count())
                <table class="table w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">Modelo</th>
                            <th class="px-4 py-3 text-left">Ano</th>
                            <th class="px-4 py-3 text-left">Data de aquisição</th>
                            <th class="px-4 py-3 text-left">KM rodados</th>
                            <th class="px-4 py-3 text-left">Placa</th>
                            <th class="px-4 py-3 text-left">Renavam</th>
                            <th class="px-4 py-3 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($veiculos as $veiculo)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">{{ $veiculo->modelo }}</td>
                                <td class="px-4 py-3">{{ $veiculo->ano }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($veiculo->data_aquisicao)->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">{{ $veiculo->kms_rodados }}</td>
                                <td class="px-4 py-3">{{ $veiculo->placa }}</td>
                                <td class="px-4 py-3">{{ $veiculo->renavam }}</td>

                                <!-- Ações -->
                                <td class="px-4 py-3 text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('veiculos.edit', $veiculo->id) }}" class="btn btn-sm btn-primary">Editar</a>

                                        <form method="POST" action="{{ route('veiculos.destroy', $veiculo->id) }}" 
                                              onsubmit="return confirm('Tem certeza que deseja excluir este veículo?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-error">Deletar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else
                <div class="p-8 text-center text-gray-500">
                    Nenhum veículo cadastrado ainda.
                </div>
            @endif

        </div>
    </div>
</x-layout>
