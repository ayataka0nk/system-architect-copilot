<section @class([$class, 'pt-2'])>
    <header class='flex items-center justify-between'>
        <div class='flex items-center'>
            <x-icon-button icon='chevron-up-down' class='feature-group-handle' noRipple />
            <h3 class='text-xl font-bold'>{{ $featureGroup->name }}</h3>
            <x-icon-button icon="pencil-square" :href="route('feature-groups.edit', $featureGroup)" />
        </div>
    </header>
    @if ($featureGroup->memo)
        <p>memo: {{ $featureGroup->memo }}</p>
    @endif
    <div class='mt-4 grid gap-2' id="feature-categories-{{ $featureGroup->id }}">
        @foreach ($featureGroup->featureCategories as $featureCategory)
            <div :data-id="{{ $featureCategory->id }}" wire:key="feature-category-{{ $featureCategory->id }}">
                <livewire:estimates.feature-category-section :featureCategory="$featureCategory" />
            </div>
        @endforeach
    </div>
    <x-button class='mt-2' icon='plus' variant='text' :href="route('feature-groups.feature-categories.create', $featureGroup->id)">カテゴリ追加</x-button>
</section>

@push('scripts')
    <script>
        window.addEventListener('load', function() {
            const id = {{ $featureGroup->id }}
            const el = document.getElementById("feature-categories-" + id);
            Sortable.create(el, {
                animation: 150,
                handle: '.feature-category-handle',
                store: {
                    set: async function(sortable) {
                        const orderedId = sortable.toArray();
                        const result = axios.put('/api/feature-categories/change-sequence', {
                            ordered_id: orderedId,
                        });
                    }
                }
            });
        });
    </script>
@endpush
