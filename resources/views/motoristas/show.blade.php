<x-layout>
    <div class="max-w-2xl mx-auto p-6">

        <!-- Cabeçalho -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Detalhes do Motorista</h1>
            <div class="flex gap-3">
                <a href="{{ route('motoristas.edit', $motorista->id) }}" class="btn btn-sm btn-ghost p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                </a>
                <form action="{{ route('motoristas.destroy', $motorista->id) }}" method="POST" 
                        onsubmit="return confirm('Tem certeza que deseja excluir este motorista?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-ghost p-1 hover:bg-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg></button>
                </form>
            </div>
        </div>

        <!-- Card de informações -->
        <div class="bg-white shadow rounded-lg p-6 flex flex-col sm:flex-row items-center sm:items-start gap-6">

            @if($motorista->nome)
                <!-- Avatar com Laravel Avatars usando o nome -->
                <div class="avatar">
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($motorista->nome) }}" 
                            alt="{{ $motorista->nome }}" 
                            class="rounded-full w-full h-full object-cover">
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/4f30df50-a0b3-4adc-ad66-1087f14255c5?vibe=stealth" alt="Anonymous User" class="rounded-full">
                    </div>
                </div>
            @endif
            

            <!-- Informações -->
            <div class="flex-1 space-y-3">
                <div>
                    <h2 class="text-xl font-medium">{{ $motorista->nome }}</h2>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-700">Número da CNH</h3>
                    <p>{{ $motorista->numero_cnh }}</p>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-700">Data de Nascimento</h3>
                    <p>{{ \Carbon\Carbon::parse($motorista->data_nascimento)->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
