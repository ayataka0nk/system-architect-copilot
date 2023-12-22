<x-layouts.user title='見積詳細'>
    <x-toolbar prevName="見積一覧" :prevLink="route('projects.estimates.index', $project->id)" :title="$estimate->name">
        <x-icon-button icon='pencil-square' :href="route('estimates.edit', $estimate->id)" />
    </x-toolbar>

    <section class='p-4'>
        <div>
            <p>{{ $estimate->name }}</p>
            <p class='whitespace-pre-wrap'>{{ $estimate->description }}</p>
        </div>
    </section>
</x-layouts.user>
