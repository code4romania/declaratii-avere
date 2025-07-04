<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <x-seo::meta />
    @stack('preload')

    @livewireStyles
    @filamentStyles
    @vite('resources/css/app.css')

    <x-site.analytics />
</head>

<body class="flex flex-col min-h-screen font-sans antialiased">
    <x-site.skip-to-content />
    <x-site.banner />

    <x-site.header />

    <div class="flex flex-1">
        {{ $slot }}
    </div>

    <x-site.footer />

    @livewireScripts
    @filamentScripts
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
