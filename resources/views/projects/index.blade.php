@php
    $items = [
        [
            'name' => 'プロジェクト一覧',
        ],
    ];
@endphp

<x-layouts.user title='プロジェクト一覧'>
    <x-breadcrumb :items="$items" />
    <section class='p-4'>
        <x-button href="{{ route('projects.create') }}" icon='plus' class=mb-4>
            プロジェクトを作成する</x-button>
        <div class='grid gap-2'>
            @foreach ($projects as $project)
                <x-card href="{{ route('projects.show', $project) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                </x-card>
            @endforeach
        </div>
    </section>
</x-layouts.user>
