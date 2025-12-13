<x-layout>
    <div class="flex justify-center mt-10">
        <form class="w-full max-w-xl bg-base-100 shadow-lg rounded-lg p-8" method="POST" action="{{ route('veiculos.store') }}">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center">Cadastro de veículo</h2>

            <!-- Modelo do veículo -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="modelo">Modelo</label>
                <input 
                    id="modelo" 
                    name="modelo" 
                    type="text" 
                    maxlength="255" 
                    required 
                    class="input input-bordered w-full"
                    placeholder="Digite o modelo do veículo"
                    value="{{ old('modelo') }}"
                >
                <span class="label-text-alt text-error">
                    @error('modelo')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Ano -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="ano">Ano</label>
                <input 
                    id="ano" 
                    name="ano" 
                    type="number" 
                    min="1900" 
                    max="2099" 
                    required 
                    class="input input-bordered w-full"
                    placeholder="Digite o ano do veículo"
                    value="{{ old('ano') }}"
                >
                <span class="label-text-alt text-error">
                    @error('ano')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Data de aquisição -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="data_aquisicao">Data de Aquisição</label>
                <input 
                    id="data_aquisicao" 
                    name="data_aquisicao" 
                    type="date" 
                    required 
                    class="input input-bordered w-full"
                    value="{{ old('data_aquisicao') }}"
                >
                <span class="label-text-alt text-error">
                    @error('data_aquisicao')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- KMs rodados -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="kms_rodados">KMs Rodados</label>
                <input 
                    id="kms_rodados" 
                    name="kms_rodados" 
                    type="number" 
                    min="0" 
                    required 
                    class="input input-bordered w-full"
                    placeholder="KMs rodados no veículo"
                    value="{{ old('kms_rodados') }}"
                >
                <span class="label-text-alt text-error">
                    @error('kms_rodados')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Renavam -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="renavam">Renavam</label>
                <input 
                    id="renavam" 
                    name="renavam" 
                    type="text" 
                    maxlength="11" 
                    required 
                    class="input input-bordered w-full"
                    placeholder="Digite o Renavam"
                    value="{{ old('renavam') }}"
                >
                <span class="label-text-alt text-error">
                    @error('renavam')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <!-- Placa -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2" for="placa">Placa</label>
                <input 
                    id="placa" 
                    name="placa" 
                    type="text" 
                    maxlength="7" 
                    required 
                    class="input input-bordered w-full"
                    placeholder="Digite a placa do veículo"
                    value="{{ old('placa') }}"
                >
            
                <span class="label-text-alt text-error">
                    @error('placa')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="flex gap-3">
                <button 
                    type="submit" 
                    class="btn btn-primary grow"
                >
                    Adicionar veículo
                </button>

                <a class="btn bg-red-600" href="{{ route('veiculos.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>

        </form>
    </div>
</x-layout>


