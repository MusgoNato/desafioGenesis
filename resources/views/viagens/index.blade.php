<x-layout>
    <div class="max-w-7xl mx-auto p-6">

        <!-- Cabeçalho + Busca -->
        <div class="flex items-center justify-between mb-4">

            <h1 class="text-2xl font-semibold">Viagens</h1>

            <div class="flex items-center gap-3">

                <form method="GET"
                    action="{{ route('viagens.index') }}"
                    class="flex items-center gap-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Buscar motorista, veículo ou status..."
                        class="input input-bordered w-72"
                    >
                    <button class="btn btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>

                    </button>

                    @if(request()->filled('search'))
                        <a href="{{ route('viagens.index') }}" class="btn btn-outline">
                            Limpar
                        </a>
                    @endif

                </form>
                

                <a href="{{ route('viagens.create') }}"
                class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Tabela -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">

            @if($viagens->count())
                <table class="table w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">Nome da viagem</th>
                            <th class="px-4 py-3 text-left">Motoristas</th>
                            <th class="px-4 py-3 text-left">Veículo</th>
                            <th class="px-4 py-3 text-left">KM</th>
                            <th class="px-4 py-3 text-left">Início</th>
                            <th class="px-4 py-3 text-left">Fim</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($viagens as $viagem)
                            <tr class="hover:bg-gray-100">

                                <!-- Nome da viagem -->
                                <td class="px-4 py-3">
                                    <span title="{{ $viagem->nome_viagem }}">
                                        {{ Str::limit($viagem->nome_viagem, 20) }}
                                    </span>
                                </td>

                                <!-- Motoristas -->
                                <td class="px-4 py-3">
                                    @php
                                        $motoristasExibir = $viagem->motoristas->take(2);
                                        $qtdRestante = $viagem->motoristas->count() - $motoristasExibir->count();
                                    @endphp

                                    @foreach ($motoristasExibir as $motorista)
                                        <span class="badge bg-gray-200 mr-1 font-medium">
                                            {{ strtok($motorista->nome, ' ') }}
                                        </span>
                                    @endforeach

                                    @if ($qtdRestante > 0)
                                        <span class="text-gray-400 text-sm">
                                            +{{ $qtdRestante }}...
                                        </span>
                                    @endif
                                </td>

                                <!-- Veículo -->
                                <td class="px-4 py-3">
                                    {{ $viagem->veiculo->modelo }}
                                </td>

                                <!-- KM -->
                                <td class="px-4 py-3">
                                    {{ number_format($viagem->km_inicial, 0, ',', '.') }} KM

                                    @if($viagem->km_final)
                                        → <strong>{{ number_format($viagem->km_final, 0, ',', '.') }} KM</strong>
                                    @endif
                                </td>


                                <!-- Início -->
                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($viagem->inicio_viagem)->format('d/m/Y H:i') }}
                                </td>

                                <!-- Fim -->
                                <td class="px-4 py-3">
                                    @if($viagem->fim_viagem)
                                        {{ \Carbon\Carbon::parse($viagem->fim_viagem)->format('d/m/Y H:i') }}
                                    @else
                                        —
                                    @endif
                                </td>

                                <!-- Status -->
                                <td class="px-4 py-3">
                                    @if($viagem->fim_viagem)
                                        <span class="badge badge-success w-full h-full flex items-center justify-center">
                                            Finalizada
                                        </span>
                                    @else
                                        <span class="badge badge-warning w-full h-full flex items-center justify-center">
                                            Em andamento
                                        </span>
                                    @endif
                                </td>

                                <!-- Ações -->
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center gap-3">

                                        <a href="{{ route('viagens.show', $viagem->id) }}"
                                           class="btn btn-sm btn-ghost p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke-width="1.5"
                                                 stroke="currentColor"
                                                 class="w-5 h-5">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('viagens.edit', $viagem->id) }}"
                                           class="btn btn-sm btn-ghost p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>

                                        </a>

                                        <form method="POST"
                                              action="{{ route('viagens.destroy', $viagem->id) }}"
                                              onsubmit="return confirm('Tem certeza que deseja excluir esta viagem?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-ghost p-1 hover:bg-red-400">
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
                    {{ $viagens->links() }}
                </div>

            @else
                <div class="p-8 text-center text-gray-500">
                    Nenhuma viagem cadastrada ainda.
                </div>
            @endif

        </div>
    </div>
</x-layout>
