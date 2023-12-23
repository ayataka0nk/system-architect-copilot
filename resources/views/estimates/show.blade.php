<x-layouts.user title='見積詳細'>
    <x-toolbar prevName="見積一覧" :prevLink="route('projects.estimates.index', $estimate->project->id)" :title="$estimate->name">
        <x-icon-button icon='pencil-square' :href="route('estimates.edit', $estimate->id)" />
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
        <div>
            <h2 class='text-2xl font-bold'>{{ $estimate->name }}</h2>
            <p class='whitespace-pre-wrap'>{{ $estimate->description }}</p>
        </div>
        <hr class='mt-4' />

        <div class='grid gap-2'>
            @foreach ($estimate->featureGroups as $featureGroup)
                <x-estimates.feature-group-section :featureGroup="$featureGroup" />
                <hr />
            @endforeach
        </div>
        <x-button class='mt-4' variant='text' icon='plus' :href="route('estimates.feature-groups.create', $estimate->id)">グループ追加</x-button>
    </section>

    @push('scripts')
        <script>
            window.addEventListener('beforeunload', function() {
                localStorage.setItem('estimates.show.scrollPosition', window.scrollY);
            });

            window.addEventListener('DOMContentLoaded', (event) => {
                const scrollPosition = localStorage.getItem('estimates.show.scrollPosition');
                if (scrollPosition) {
                    window.scrollTo(0, scrollPosition);
                }
            });
        </script>
    @endpush
</x-layouts.user>
