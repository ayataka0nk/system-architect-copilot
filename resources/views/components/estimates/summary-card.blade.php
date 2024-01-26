<x-card :href="route('estimates.show', $estimate)" class="flex h-40 flex-col">
    <h5 class="">{{ $estimate->name }}</h5>
    <p class="line-clamp-3 whitespace-pre-wrap">{{ $estimate->description }}</p>
    <div class='mt-auto text-right'>
        <p class='text-sm'>{{ $estimate->updated_at }}</p>
    </div>
</x-card>
