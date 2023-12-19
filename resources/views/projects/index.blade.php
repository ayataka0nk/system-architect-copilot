@php
    $items = [
        [
            'name' => 'プロジェクト一覧',
        ],
    ];
@endphp

<x-layouts.user title='プロジェクト一覧'>
    <x-breadcrumb :items="$items" />
    <x-button href="{{ route('projects.create') }}" variant='filled' color='primary' icon='plus'>
        プロジェクトを作成する</x-button>
    @foreach ($projects as $project)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <p class="card-text">{{ $project->description }}</p>
                <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
    @endforeach

</x-layouts.user>
