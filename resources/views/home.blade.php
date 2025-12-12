<x-layout>
    <div class="min-h-[calc(100vh-10rem)] flex flex-col justify-center items-center text-center space-y-12">

       <!-- Título com animação de entrada nativa do daisyUI -->
        <div class="space-y-6">
            <h1 class="text-5xl md:text-6xl font-bold text-primary text-center">
                Bem-vindo ao Sistema de Controle de Viagens
            </h1>
            <p class="text-xl md:text-2xl text-base-content/70 max-w-3xl mx-auto text-center">
                Gerencie veículos, motoristas e viagens de forma simples, segura e eficiente.
            </p>
        </div>

        <!-- Cards de opções -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-5xl">

            <!-- Veículos -->
            <a href="{{ route('veiculos.index') }}" 
               class="bg-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 transform">
                <div class="card-body items-center text-center p-10">
                    <div class="bg-primary/10 p-6 rounded-full group-hover:bg-primary/20 transition-colors duration-500">
                        <svg class="w-16 h-16 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </div>
                    <h2 class="card-title text-2xl mt-6">Veículos</h2>
                    <p class="text-base-content/60">Cadastro e gerenciamento completo de veículos.</p>
                </div>
            </a>

            <!-- Motoristas -->
            <a href="{{ route('motoristas.index') }}"
               class="bg-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 transform">
                <div class="card-body items-center text-center p-10">
                    <div class="bg-primary/10 p-6 rounded-full group-hover:bg-primary/20 transition-colors duration-500">
                        <svg class="w-16 h-16 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </div>
                    <h2 class="card-title text-2xl mt-6">Motoristas</h2>
                    <p class="text-base-content/60">Cadastro e gerenciamento de motoristas.</p>
                </div>
            </a>

            <!-- Viagens -->
            <a href="{{ route('viagens.index') }}" 
               class="bg-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 transform">
                <div class="card-body items-center text-center p-10">
                    <div class="bg-primary/10 p-6 rounded-full group-hover:bg-primary/20 transition-colors duration-500">
                        <svg class="w-16 h-16 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0"></path><circle cx="12" cy="8" r="2"></circle><path d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712"></path>
                        </svg>
                    </div>
                    <h2 class="card-title text-2xl mt-6">Viagens</h2>
                    <p class="text-base-content/60">Registre e acompanhe todas as viagens.</p>
                </div>
            </a>
        </div>
</x-layout>