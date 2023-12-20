<div
    {{ $attributes->class('sticky top-0 z-10 h-12 pr-1 bg-surface-container-high flex justify-between items-center') }}>
    <x-button variant='text' icon='chevron-left' :href="$prevLink" class='w-4/12' truncate>{{ $prevName }}</x-button>
    <h1 class='absolute left-1/2 w-5/12 -translate-x-1/2 truncate text-center'>{{ $title }}</h1>
    <div>
        {{ $slot }}
    </div>
</div>
