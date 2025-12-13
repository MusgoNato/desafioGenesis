<x-layout>
    <div class="max-w-xl mx-auto mt-10 p-6 card shadow-lg bg-base-100">
        <form class="form" action="{{ route('viagens.update', $viagem) }}" method="POST">
            @csrf
            @method('PUT')
            <h2 class="text-2xl font-bold mb-6 text-center">Ediçao de Viagem</h2>

            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text font-medium">Nome da viagem</span>
                </label>

                <input 
                    type="text" 
                    name="nome_viagem"
                    maxlength="100"
                    placeholder="Ex: Viagem para o Caribe"
                    class="input input-bordered w-full"
                    required
                    value="{{ $viagem->nome_viagem }}"
                />

                @error('nome_viagem')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Motoristas -->
            <div class="form-control mb-5">
                <label class="label">
                    <span class="label-text font-semibold">Motoristas</span>
                </label>
                <select name="motoristas[]" multiple class="select select-bordered w-full h-40" required>
                    @foreach ($motoristas as $motorista)
                        <option value="{{ $motorista->id }}"
                            @selected(
                                old('motoristas')
                                ? collect(old('motoristas'))->contains($motorista->id)
                                : $viagem->motoristas->contains($motorista->id)
                            )>
                            {{ $motorista->nome }}
                            
                        </option>
                    @endforeach
                </select>
                <label class="label">
                    <span class="label-text-alt">Segure CTRL para selecionar múltiplos</span>
                </label>

                @error('motoristas')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Veículo -->
            <div class="form-control mb-5">
                <label class="label">
                    <span class="label-text font-semibold">Veículo</span>
                </label>
                <select name="veiculo_id" class="select select-bordered w-full">
                    <option value="">Selecione um veículo</option>
                    @foreach ($veiculos as $veiculo)
                        <option value="{{ $veiculo->id }}"
                            {{ old('veiculo_id') 
                                ? (old('veiculo_id') == $veiculo->id ? 'selected' : '') 
                                : ($viagem->veiculo_id == $veiculo->id ? 'selected' : '') 
                            }}>
                            {{ $veiculo->modelo }}
                        </option>
                    @endforeach
                </select>

                @error('veiculo_id')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>


            <!-- KM inicial -->
            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text font-medium">KM inicial</span>
                </label>

                <input 
                    type="number" 
                    name="km_inicial"
                    maxlength="100"
                    placeholder="Insira o km inicial do início da viagem"
                    class="input input-bordered w-full"
                    required
                    value="{{ $viagem->km_inicial }}"
                />

                @error('km_inicial')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- KM Final -->
            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text font-medium">KM Final</span>
                </label>

                <input 
                    type="number" 
                    name="km_final"
                    maxlength="100"
                    placeholder="Insira o km final"
                    class="input input-bordered w-full"
                    required
                    value="{{ old('km_final', $viagem->km_final) }}"
                />

                @error('km_final')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Data e hora inicial da viagem -->
            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text font-medium">Data e hora de início da viagem</span>
                </label>

                <input 
                    type="datetime-local" 
                    name="inicio_viagem"
                    class="input input-bordered w-full"
                    required
                    value="{{ $viagem->inicio_viagem }}"
                />

                @error('inicio_viagem')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Data e hora do fim da viagem -->
            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text font-medium">Data e hora final da viagem</span>
                </label>

                <input 
                    type="datetime-local" 
                    name="fim_viagem"
                    class="input input-bordered w-full"
                    required
                    value="{{ old('fim_viagem', $viagem->fim_viagem) }}"
                />

                @error('fim_viagem')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-3 mt-6">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('viagens.index') }}" class="btn bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>

        </form>
    </div>

</x-layout>

