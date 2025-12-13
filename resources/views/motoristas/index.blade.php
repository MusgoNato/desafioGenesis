<x-layout>
    <div class="max-w-7xl mx-auto p-6">

        <!-- Cabeçalho -->
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-semibold">Motoristas</h1>
            <div class="flex items-center gap-3">

                <form method="GET" action="{{ route('motoristas.index') }}" class="flex gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Buscar por nome ou número da CNH"
                        class="input input-bordered w-72"
                    >
                    <button class="btn btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>

                    @if(request()->filled('search'))
                        <a href="{{ route('motoristas.index') }}" class="btn btn-outline">
                            Limpar
                        </a>
                    @endif
                </form>

                <a href="{{ route('motoristas.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
            </div>
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
                                <td class="px-4 py-3">{{ $motorista->nome }}</td>

                                <td class="px-4 py-3">
                                    <span class="badge bg-gray-200 font-medium">
                                        {{ $motorista->numero_cnh }}
                                    </span>
                                </td>

                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($motorista->data_nascimento)->format('d/m/Y') }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('motoristas.edit', $motorista->id) }}"
                                           class="btn btn-sm btn-ghost p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>

                                        <form method="POST"
                                              action="{{ route('motoristas.destroy', $motorista->id) }}"
                                              onsubmit="return confirm('Tem certeza que deseja excluir este motorista?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-ghost p-1 hover:bg-red-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginação -->
                <div class="mt-4 px-4 pb-4">
                    {{ $motoristas->links() }}
                </div>
            @else
                <div class="p-8 text-center text-gray-500">
                    Nenhum motorista cadastrado ainda.
                </div>
            @endif

        </div>
    </div>
</x-layout>
