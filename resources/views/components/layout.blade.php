<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema para controle de viagens</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@5" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" type="text/css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen flex flex-col bg-base-200 font-sans">
        
        <!-- Alertas de sucesso -->
        @if(session('success'))
            <div class="toast toast-top toast-end z-50">
                <div class="alert alert-success animate-fade-out">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/></svg>
                    <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                </div>
            </div>
        @endif
    
        <!-- Componente de navegação -->
        <x-navegacao></x-navegacao>

        <!-- Conteudo da página -->
        <div class="container">
            {{ $slot }}
        </div>    
    </body>

</html>