<x-layout>
    <div class="max-w-xl mx-auto mt-10 p-6 card shadow-lg bg-base-100">
        <form class="form" action="{{ route('viagens.store') }}" method="POST">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center">Cadastro de Viagem</h2>

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
                    value="{{ old('nome_viagem') }}"
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

                <select id="motoristas" name="motoristas[]" multiple>
                    @foreach ($motoristas as $motorista)
                        <option value="{{ $motorista->id }}"
                            @selected(collect(old('motoristas'))->contains($motorista->id))>
                            {{ $motorista->nome }}
                        </option>
                    @endforeach
                </select>

                @error('motoristas')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>


            <!-- Veículo -->
            <div class="form-control mb-5">
                <label class="label">
                    <span class="label-text font-semibold">Veículo</span>
                </label>

                <select id="veiculo" name="veiculo_id" class="w-full">
                    <option value=" " disabled selected></option>
                    @foreach ($veiculos as $veiculo)
                        <option value="{{ $veiculo->id }}"
                            {{ old('veiculo_id') == $veiculo->id ? 'selected' : '' }}>
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
                    placeholder="Ex: 123456"
                    class="input input-bordered w-full"
                    required
                    min="0"
                    max="99999"
                    pattern="[0-9]*"
                    step="1"
                    value="{{ old('km_inicial') }}"
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
                    value="{{ old('km_final') }}"
                />

                @error('km_final')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Data e hora inicial da viagem -->
            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text font-medium">Data e hora inicial da viagem</span>
                </label>

                <input 
                    type="datetime-local" 
                    name="inicio_viagem"
                    class="input input-bordered w-full"
                    required
                    value="{{ old('inicio_viagem') }}"
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
                    value="{{ old('fim_viagem') }}"
                />

                @error('fim_viagem')
                    <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-3 mt-6">
                <button type="submit" class="btn btn-primary">Adicionar viagem</button>
                <a href="{{ route('viagens.index') }}" class="btn bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>

        </form>
    </div>
    <script>
        new Choices('#motoristas', {
            removeItemButton: true,
            searchPlaceholderValue: "Buscar...",
            placeholderValue: "Selecione motoristas",
            shouldSort: false,
            placeholder: true,
        });


        new Choices('#veiculo', {
            searchEnabled: true,
            placeholderValue: "Selecione um veículo",
            placeholder: true,
            shouldSort: false,
        });

    </script>
</x-layout>

