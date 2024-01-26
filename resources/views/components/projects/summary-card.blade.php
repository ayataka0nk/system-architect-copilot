<x-card :href="route('projects.show', $project)" class="flex h-40 flex-col">
    <h5 class="text-lg">{{ $project->name }}</h5>
    <p class="line-clamp-3 whitespace-pre-wrap">{{ $project->description }}</p>
    <div class='mt-auto text-right'>
        <p class='text-sm'>{{ $project->updated_at }}</p>
    </div>
</x-card>
