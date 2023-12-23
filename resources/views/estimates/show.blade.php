<x-layouts.user title='見積詳細'>
    <x-toolbar prevName="見積一覧" :prevLink="route('projects.estimates.index', $project->id)" :title="$estimate->name">
        <x-icon-button icon='pencil-square' :href="route('estimates.edit', $estimate->id)" />
    </x-toolbar>

    <section class='p-4'>
        <div>
            <p>{{ $estimate->name }}</p>
            <p class='whitespace-pre-wrap'>{{ $estimate->description }}</p>
        </div>
        <div class='grid gap-2'>
            @foreach ($estimate->featureGroups as $featureGroup)
                <x-estimates.feature-group-section :featureGroup="$featureGroup" />
            @endforeach
        </div>
        <x-button class='mt-4' :href="route('estimates.feature-groups.create', $estimate->id)">機能グループ作成</x-button>
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
