<x-layout></x-layout>

<div class="flex justify-center mt-10">
    <form class="w-full max-w-xl bg-base-100 shadow-lg rounded-lg p-8" method="POST" action="{{ route('motoristas.update', $motorista->id) }}">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6 text-center">Edição de motorista</h2>

        <!-- Nome do motorista -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="modelo">Nome</label>
            <input 
                id="nome" 
                name="nome" 
                type="text" 
                maxlength="255" 
                required
                class="input input-bordered w-full"
                placeholder="Ex: João da Silva Souza"
                value="{{ $motorista->nome }}"
            >
            <span class="label-text-alt text-error">
                @error('nome')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <!-- Data de nascimento -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="data_nascimento">Data de nascimento</label>
            <input 
                id="data_nascimento" 
                name="data_nascimento" 
                type="date" 
                required 
                class="input input-bordered w-full"
                value="{{ $motorista->data_nascimento }}"
            >
            <span class="label-text-alt text-error">
                @error('data_nascimento')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <!-- Numero da CNH -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="kms_rodados">N° CNH</label>
            <input 
                id="numero_cnh" 
                name="numero_cnh" 
                type="text" 
                maxlength="11"
                required 
                class="input input-bordered w-full"
                placeholder="Ex: 09876543210"
                value="{{ $motorista->numero_cnh }}"
            >
            <span class="label-text-alt text-error">
                @error('numero_cnh')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="flex gap-3">
            <button 
                type="submit" 
                class="btn btn-primary grow"
            >
                Finalizar edição
            </button>

            <a class="btn bg-red-500 text-white" href="{{ route('motoristas.index') }}">
                Cancelar
            </a>
        </div>
    </form>
</div>