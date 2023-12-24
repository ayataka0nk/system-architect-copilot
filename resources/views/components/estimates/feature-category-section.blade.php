<x-card {{ $attributes }}>
    <section>
        <header class='flex items-center justify-between'>
            <div class='flex items-center'>
                <x-icon-button icon='chevron-up-down' class='feature-category-handle' noRipple />
                <h4 class='text-lg font-bold'>{{ $featureCategory->name }}</h4>
            </div>
            <x-icon-button icon="pencil-square" :href="route('feature-categories.edit', $featureCategory)" />
        </header>
        @if ($featureCategory->memo)
            <p>memo: {{ $featureCategory->memo }}</p>
        @endif
        <div id="features-{{ $featureCategory->id }}">
            @foreach ($featureCategory->features as $feature)
                <section class='grid grid-cols-[50px_1fr_4fr_70px_50px] gap-2'>
                    <x-icon-button icon='chevron-up-down' class='feature-handle' noRipple />
                    <h5 class='pt-3 font-bold'>{{ $feature->name }}</h5>
                    <p class='whitespace-pre-wrap pt-3'>{{ $feature->description }}</p>
                    <p class='pt-3'>{{ $feature->estimated_hours }} h</p>
                    <x-icon-button icon="pencil-square" :href="route('features.edit', $feature)" />
                </section>
            @endforeach
        </div>
        <x-button icon='plus' variant='text' :href="route('feature-categories.features.create', $featureCategory->id)">機能追加</x-button>
    </section>
</x-card>

@push('scripts')
    <script>
        window.addEventListener('load', function() {
            const id = {{ $featureCategory->id }};
            const el = document.getElementById("features-" + id);
            Sortable.create(el, {
                animation: 150,
                handle: '.feature-handle',
                onEnd: function(evt) {
                    console.log(evt);
                }
            });
        });
    </script>
@endpush
