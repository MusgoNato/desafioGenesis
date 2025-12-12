<nav class="navbar bg-base-100 px-4">
    <div class="grid w-full grid-cols-3 items-center">
        <!-- Home à esquerda -->
        <div class="flex justify-start">
            <a class="flex items-center" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>
        </div>

        <!-- Links centralizados -->
        <div class="flex justify-center gap-x-4">
            <a class="btn btn-primary" href="{{ route('veiculos.index') }}">Veículos</a>
            <a class="btn btn-primary" href="{{ route('motoristas.index') }}">Motoristas</a>
            <a class="btn btn-primary" href="{{ route('viagens.index') }}">Viagens</a>
        </div>
    </div>
</nav>
