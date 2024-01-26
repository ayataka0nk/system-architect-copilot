<x-layouts.user title='プロジェクト詳細'>
    <x-toolbar prevName="一覧" :prevLink="route('projects.index')" :title="$project->name">
    </x-toolbar>
    <x-breadcrumbs :items="[['name' => 'プロジェクト一覧', 'url' => route('projects.index')], ['name' => $project->name]]" />
    <section class='p-4'>
        <header class='flex items-center text-2xl font-bold'>
            <h1>{{ $project->name }}</h1>
            <x-icon-button icon='pencil-square' :href="route('projects.edit', $project->id)" />
        </header>
        <p class='whitespace-pre-wrap'>{{ $project->description }}</p>
        <x-button :href="route('projects.estimates.index', $project->id)">見積一覧</x-button>
    </section>
</x-layouts.user>
