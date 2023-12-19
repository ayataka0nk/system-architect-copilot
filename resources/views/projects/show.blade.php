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
    <x-button href="{{ route('projects.edit', $project->id) }}" variant='filled' color='primary' icon='pencil'>
        プロジェクトを編集する</x-button>
    <div>
        <p>{{ $project->name }}</p>
        <p>{{ $project->description }}</p>
    </div>
</x-layouts.user>
