<x-layouts.user title='見積詳細'>
    <div class='fixed left-0 top-0 z-40 h-full w-full bg-primary opacity-30' id='loading'></div>
    <x-toolbar prevName="見積一覧" :prevLink="route('projects.estimates.index', $estimate->project->id)" :title="$estimate->name">
    </x-toolbar>
    <x-breadcrumbs :items="[
        [
            'name' => 'プロジェクト一覧',
            'url' => route('projects.index'),
        ],
        ['name' => $estimate->project->name, 'url' => route('projects.show', $estimate->project->id)],
        ['name' => '見積一覧', 'url' => route('projects.estimates.index', $estimate->project->id)],
        ['name' => $estimate->name],
    ]" />
    <section class='p-4'>
        <header class='flex items-center justify-between'>
            <h2 class='text-2xl font-bold'>{{ $estimate->name }}</h2>
            <x-icon-button icon='pencil-square' :href="route('estimates.edit', $estimate->id)" />
        </header>
        <p class='whitespace-pre-wrap'>{{ $estimate->description }}</p>
        <hr class='mt-4' />

        <div class='grid gap-2' id='feature-groups'>
            @foreach ($estimate->featureGroups as $featureGroup)
                <x-estimates.feature-group-section :featureGroup="$featureGroup" data-id="{{ $featureGroup->id }}"
                    wire:key="feature-group-{{ $featureGroup->id }}" />
            @endforeach
        </div>
        <x-button class='mt-4' variant='text' icon='plus' :href="route('estimates.feature-groups.create', $estimate->id)">グループ追加</x-button>
    </section>

    @pushonce('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            window.addEventListener('beforeunload', function() {
                localStorage.setItem('estimates.show.scrollPosition', window.scrollY);
            });

            window.addEventListener('load', (event) => {
                const scrollPosition = localStorage.getItem('estimates.show.scrollPosition');
                if (scrollPosition) {
                    window.scrollTo(0, scrollPosition);
                }
                document.getElementById('loading').style.display = 'none';
            });
        </script>
    @endpushonce
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
</x-layouts.user>
