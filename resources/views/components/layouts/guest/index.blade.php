<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class='bg-surface'>
    <x-layouts.guest.header class="h-16"></x-layouts.guest.header>
    <h1>{{ $title }}</h1>
    {{ $slot }}
</body>

</html>
