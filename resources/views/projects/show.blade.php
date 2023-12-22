<x-layouts.user title='プロジェクト詳細'>
    <x-toolbar prevName="一覧" :prevLink="route('projects.index')" :title="$project->name">
        <x-icon-button icon='pencil-square' :href="route('projects.edit', $project->id)" />
    </x-toolbar>

    <section class='p-4'>
        <div>
            <p>{{ $project->name }}</p>
            <p class='whitespace-pre-wrap'>{{ $project->description }}</p>
        </div>
        <x-button :href="route('projects.estimates.index', $project->id)">見積</x-button>
    </section>
</x-layouts.user>
