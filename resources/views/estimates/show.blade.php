<x-layouts.user title='見積詳細'>
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
    <section class='p-2'>
        <header class='flex items-center justify-between'>
            <h2 class='text-2xl font-bold'>{{ $estimate->name }}</h2>
            <x-icon-button icon='pencil-square' :href="route('estimates.edit', $estimate->id)" />
        </header>
        <p class='whitespace-pre-wrap'>{{ $estimate->description }}</p>
        <hr class='mt-4' />

        <div class='grid gap-2' id='feature-groups'>
            @foreach ($estimate->featureGroups as $featureGroup)
                <x-estimates.feature-group-section :featureGroup="$featureGroup" data-id="{{ $featureGroup->id }}" />
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
            });
        </script>
    @endpushonce

</x-layouts.user>
