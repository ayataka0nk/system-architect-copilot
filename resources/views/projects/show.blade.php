@php
    $items = [
        [
            'name' => 'プロジェクト一覧',
            'path' => route('projects.index'),
        ],
        [
            'name' => $project->name,
        ],
    ];
@endphp

<x-layouts.user title='プロジェクト詳細'>
    <x-breadcrumb :items="$items" />
    <section class='p-4'>
        <x-button href="{{ route('projects.edit', $project->id) }}" icon='pencil' class='mb-4'>
            編集</x-button>
        <div>
            <p>{{ $project->name }}</p>
            <p>{{ $project->description }}</p>
        </div>
    </section>
</x-layouts.user>
