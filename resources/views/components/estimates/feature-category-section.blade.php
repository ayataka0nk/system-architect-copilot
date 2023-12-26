<div {{ $attributes->class('bg-surface-container rounded-lg p-2') }}>
    <section>
        <header class='flex items-center justify-between'>
            <div class='flex items-center'>
                <x-icon-button icon='chevron-up-down' class='feature-category-handle' noRipple />
                <h4 class='text-lg font-bold'>{{ $featureCategory->name }}</h4>
                <x-icon-button icon="pencil-square" :href="route('feature-categories.edit', $featureCategory)" />
            </div>
        </header>
        @if ($featureCategory->memo)
            <p>memo: {{ $featureCategory->memo }}</p>
        @endif
        <div class='flex justify-end py-2'>
            <x-button icon='sparkles' type='button'
                x-on:click="
                axios.put('{{ route('feature-categories.propose-estimated-hours', $featureCategory) }}')
            ">一括見積</x-button>
        </div>
        <div id="features-{{ $featureCategory->id }}" class='grid gap-2'>
            @foreach ($featureCategory->features as $feature)
                <x-estimates.feature-section :feature="$feature" data-id="{{ $feature->id }}" />
            @endforeach
        </div>
        <div class='py-2'>
            <x-button icon='plus' variant='text' :href="route('feature-categories.features.create', [
                $featureCategory->id,
                'sequence' => $featureCategory->features->last()->sequence + 1,
            ])">機能追加</x-button>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        window.addEventListener('load', function() {
            const id = {{ $featureCategory->id }};
            const el = document.getElementById("features-" + id);
            Sortable.create(el, {
                animation: 150,
                handle: '.feature-handle',
                store: {
                    set: async function(sortable) {
                        const orderedId = sortable.toArray();
                        const result = axios.put('/api/features/change-sequence', {
                            ordered_id: orderedId,
                        });
                    }
                },
            });
        });
    </script>
@endpush
