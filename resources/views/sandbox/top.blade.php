@php
    $iconval = 'heroicon-o-camera';
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>サンドボックス</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>

<body class='bg-surface'>
    <h1>サンドボックス</h1>

    <p>サンドボックスです。</p>
    <div class='flex flex-col gap-3'>
        <div>
            <x-button variant='filled' color='primary'>Filled Primary</x-button>
            <x-button variant='filled' color='secondary'>Filled Secondary</x-button>
            <x-button variant='filled' color='tertiary'>Filled Tertiary</x-button>
        </div>
        <div>
            <x-button variant='filled' color='primary' icon='plus'>
                Filled Primary Left Icon
            </x-button>
            <x-button variant='filled' color='secondary' icon='plus'>
                Filled Secondary Left Icon
            </x-button>
            <x-button variant='filled' color='tertiary' icon='plus'>
                Filled Tertiary Left Icon
            </x-button>
        </div>

        <div>
            <x-button variant='outlined' color='primary'>
                Outlined Primary
            </x-button>
            <x-button variant='outlined' color='secondary'>
                Outlined Secondary
            </x-button>
            <x-button variant='outlined' color='tertiary'>
                Outlined Tertiary
            </x-button>
        </div>
        <div>
            <x-button variant='outlined' color='primary' icon='plus'>
                Outlined Primary Left Icon
            </x-button>
            <x-button variant='outlined' color='secondary' icon='plus'>
                Outlined Secondary Left Icon
            </x-button>
            <x-button variant='outlined' color='tertiary' icon='plus'>
                Outlined Tertiary Left Icon
            </x-button>
        </div>
        <div>
            <x-button variant='text' color='primary'>
                Outlined Primary
            </x-button>
            <x-button variant='text' color='secondary'>
                Outlined Secondary
            </x-button>
            <x-button variant='text' color='tertiary'>
                Outlined Tertiary
            </x-button>
        </div>
        <div>
            <x-text-field id='hoge' label='hoge' class="ma" />
            <x-text-area id='foo' rows='5' label='bar' />
        </div>
        <div>
            <x-icon :name="$iconval" class="w-6 h-6 text-red-900" />
        </div>
    </div>
</body>

</html>
