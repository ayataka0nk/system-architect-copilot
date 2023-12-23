<nav {{ $attributes->class(['flex flex-wrap items-center p-2']) }}>
    <x-button variant='text' :href="route('dashboard')">ホーム</x-button>
    @foreach ($items as $item)
        <div class='text-nowrap flex items-center'>
            <div><x-icon name="heroicon-s-chevron-right" class="h-5 w-5" /></div>
            @if (isset($item['url']))
                <x-button variant='text' :href="$item['url']">{{ $item['name'] }}</x-button>
            @else
                <p class='px-3 text-sm'>{{ $item['name'] }}</p>
            @endif
        </div>
    @endforeach
</nav>
