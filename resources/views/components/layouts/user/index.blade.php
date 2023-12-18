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

<body class="bg-surface">
    <div x-data="{
        showNav: false,
        toggleNav(event) {
            this.showNav = !this.showNav
        }
    }">
        <x-layouts.user.header />
        <x-layouts.user.navigation class='fixed left-0 top-0 overflow-y-auto' />
        <section>
            <h1>{{ $title }}</h1>
            <div>
                {{ $slot }}
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
                <div>dummy</div>
            </div>
        </section>
    </div>
</body>

</html>
