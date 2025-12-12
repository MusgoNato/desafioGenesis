<x-layout>
    <div class="max-w-7xl mx-auto p-6">
        <!-- Cabeçalho -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Motoristas</h1>
            <a href="{{ route('motoristas.create') }}" class="btn btn-primary">Cadastrar Motorista</a>
        </div>

        <!-- Tabela -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">

            @if($motoristas->count())
                <table class="table w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">Nome</th>
                            <th class="px-4 py-3 text-left">CNH</th>
                            <th class="px-4 py-3 text-left">Data de Nascimento</th>
                            <th class="px-4 py-3 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($motoristas as $motorista)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">
                                    {{ $motorista->nome }}
                                </td>

                                <td class="px-4 py-3">
                                    <span class="badge bg-gray-200 font-medium">{{ $motorista->numero_cnh }}</span>
                                </td>

                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($motorista->data_nascimento)->format('d/m/Y') }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('motoristas.edit', $motorista->id) }}" class="btn btn-sm btn-primary">
                                            Editar
                                        </a>

                                        <form method="POST" action="{{ route('motoristas.destroy', $motorista->id) }}"
                                              onsubmit="return confirm('Tem certeza que deseja excluir este motorista?')">
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
                    Nenhum motorista cadastrado ainda.
                </div>
            @endif

        </div>
    </div>
</x-layout>
