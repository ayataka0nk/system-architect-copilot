<x-layouts.user title='プロジェクト一覧'>
    <x-toolbar prevName="ホーム" :prevLink="route('dashboard')" title='プロジェクト一覧'>
    </x-toolbar>
    <x-breadcrumbs :items="[['name' => 'プロジェクト一覧']]" />
    <div class='px-4'>
        <x-button icon='plus' :href="route('projects.create')">プロジェクト作成</x-button>
    </div>
    <section class='p-4'>
        <div class='grid gap-2'>
            @foreach ($projects as $project)
                <x-card :href="route('projects.show', $project)" class="h-32">
                    <h5 class="">{{ $project->name }}</h5>
                    <p class="line-clamp-3 whitespace-pre-wrap">{{ $project->description }}</p>
                </x-card>
            @endforeach
        </div>
        {{ $projects->links() }}
    </section>
</x-layouts.user>
