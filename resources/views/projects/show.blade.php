<x-layouts.user title='プロジェクト詳細'>
    <x-toolbar prevName="一覧" :prevLink="route('projects.index')" :title="$project->name">
        <x-icon-button icon='pencil-square' :href="route('projects.edit', $project->id)" />
    </x-toolbar>

    <section class='p-4'>
        <div>
            <p>{{ $project->name }}</p>
            <p>{{ $project->description }}</p>
        </div>
    </section>
</x-layouts.user>
