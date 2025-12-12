<x-layout>
    <div class="max-w-7xl mx-auto p-6">
    <!-- Cabeçalho -->
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Viagens</h1>
        <a href="{{ route('viagens.create') }}" class="btn btn-primary">Adicionar viagem</a>
    </div>

    <!-- Tabela -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">

        @if($viagens->count())
            <table class="table w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
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

                            <!-- Motoristas -->
                            <td class="px-4 py-3">
                                @php
                                    $motoristsaExibir = $viagem->motoristas->take(2);
                                    $qtd_restante = $viagem->motoristas->count() - $motoristsaExibir->count();
                                @endphp

                                @foreach ($motoristsaExibir as $motorista)
                                    <span class="badge bg-gray-200 mr-1 font-medium">
                                        {{ strtok($motorista->nome, ' ') }}
                                    </span>
                                @endforeach

                                @if ($qtd_restante > 0)
                                    <span class="text-gray-400">+{{ $qtd_restante }}...</span>
                                @endif
                            </td>

                            <!-- Veículo -->
                            <td class="px-4 py-3">
                                {{ $viagem->veiculo->modelo }}
                            </td>

                            <!-- KM -->
                            <td class="px-4 py-3">
                                {{ $viagem->km_inicial }}
                                @if($viagem->km_final)
                                    → <strong>{{ $viagem->km_final }}</strong>
                                @endif
                            </td>

                            <!-- Data inicial -->
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($viagem->inicio_viagem)->format('d/m/Y H:i') }}
                            </td>

                            <!-- Data final (se houver) -->
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
                                    <span class="badge badge-success">Finalizada</span>
                                @else
                                    <span class="badge badge-warning">Em andamento</span>
                                @endif
                            </td>

                            <!-- Ações -->
                            <td class="px-4 py-3 text-center">
                                <div class="flex gap-4 justify-center">

                                    <a href="{{ route('viagens.show', $viagem->id) }}" class="btn btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('viagens.edit', $viagem->id) }}"
                                       class="btn btn-sm btn-primary">
                                        Editar
                                    </a>

                                    <form method="POST"
                                          action="{{ route('viagens.destroy', $viagem->id) }}"
                                          onsubmit="return confirm('Tem certeza que deseja excluir esta viagem?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-error">
                                            Deletar
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else

            <div class="p-8 text-center text-gray-500">
                Nenhuma viagem cadastrada ainda.
            </div>

        @endif
    </div>
</div>

</x-layout>

