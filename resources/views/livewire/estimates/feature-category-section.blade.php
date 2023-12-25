<x-card @class([$class]) data-id="{{ $dataId }}">
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
        <div class='mt-2 flex justify-end'>
            <x-button icon='sparkles' wire:click='proposeEstimatedHours'>一括見積</x-button>
        </div>
        <div id="features-{{ $featureCategory->id }}">
            @foreach ($featureCategory->features as $feature)
                <livewire:estimates.feature-section :feature="$feature" wire:key="feature-{{ $feature->id }}"
                    data-id="{{ $feature->id }}" />
            @endforeach
        </div>
        <x-button icon='plus' variant='text' :href="route('feature-categories.features.create', [
            $featureCategory->id,
            'sequence' => $featureCategory->features->last()->sequence + 1,
        ])">機能追加</x-button>
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