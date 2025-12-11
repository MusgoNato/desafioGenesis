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

    <!-- Componente de navegação -->
    <x-navegacao></x-navegacao>

    <!-- Conteudo da página -->
    <div class="container">
        {{ $slot }}
    </div>

</html>