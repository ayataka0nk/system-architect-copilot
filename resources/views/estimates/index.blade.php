<x-layouts.user title='見積一覧'>
    <x-toolbar :prevName="$project->name" :prevLink="route('projects.show', $project->id)" title='見積一覧'>
    </x-toolbar>
    <x-breadcrumbs :items="[
        [
            'name' => 'プロジェクト一覧',
            'url' => route('projects.index'),
        ],
        ['name' => $project->name, 'url' => route('projects.show', $project->id)],
        ['name' => '見積一覧'],
    ]" />
    <div class='px-4'>
        <x-button icon='plus' :href="route('projects.estimates.create', $project->id)">見積作成</x-button>
    </div>
    <section class='p-4'>
        <div class='grid gap-2'>
            @foreach ($estimates as $estimate)
                <x-card :href="route('estimates.show', $estimate)" class="flex h-40 flex-col">
                    <h5 class="">{{ $estimate->name }}</h5>
                    <p class="line-clamp-3 whitespace-pre-wrap">{{ $estimate->description }}</p>
                    <div class='mt-auto text-right'>
                        <p class='text-sm'>{{ $estimate->updated_at }}</p>
                    </div>
                </x-card>
            @endforeach
        </div>
    </section>
    {{ $estimates->links() }}
</x-layouts.user>
