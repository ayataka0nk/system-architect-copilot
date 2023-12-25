<section class='p-2'>
    <header class='flex items-center justify-between'>
        <h2 class='text-2xl font-bold'>{{ $estimate->name }}</h2>
        <x-icon-button icon='pencil-square' :href="route('estimates.edit', $estimate->id)" />
    </header>
    <p class='whitespace-pre-wrap'>{{ $estimate->description }}</p>
    <hr class='mt-4' />

    <div class='grid gap-2' id='feature-groups'>
        @foreach ($estimate->featureGroups as $featureGroup)
            <livewire:estimates.feature-group-section :featureGroup="$featureGroup" data-id="{{ $featureGroup->id }}"
                wire:key="feature-group-{{ $featureGroup->id }}" />
        @endforeach
    </div>
    <x-button class='mt-4' variant='text' icon='plus' :href="route('estimates.feature-groups.create', $estimate->id)">グループ追加</x-button>
</section>

{{-- @push('scripts')
        <script>
            window.addEventListener('load', function() {
                const el = document.getElementById("feature-groups");
                Sortable.create(el, {
                    animation: 150,
                    handle: '.feature-group-handle',
                    store: {
                        set: async function(sortable) {
                            const orderedId = sortable.toArray();
                            const result = axios.put('/api/feature-groups/change-sequence', {
                                ordered_id: orderedId,
                            });
                        }
                    },
                });
            });
        </script>
    @endpush --}}
