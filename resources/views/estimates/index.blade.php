<x-layouts.user title='見積一覧'>
    <x-toolbar :prevName="$project->name" :prevLink="route('projects.show', $project->id)" title='見積一覧'>
        <x-icon-button icon='pencil-square' :href="route('projects.estimates.create', $project->id)" />
    </x-toolbar>
    <section class='p-4'>
        <div class='grid gap-2'>
            @foreach ($estimates as $estimate)
                <x-card :href="route('estimates.show', $estimate)" class="min-h-32">
                    <h5 class="">{{ $estimate->name }}</h5>
                    <p class="line-clamp-3 whitespace-pre-wrap">{{ $estimate->description }}</p>
                </x-card>
            @endforeach
        </div>
    </section>
</x-layouts.user>
