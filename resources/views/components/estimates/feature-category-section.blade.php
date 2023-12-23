<x-card>
    <section>
        <header class='flex items-center justify-between'>
            <h4 class='text-lg font-bold'>{{ $featureCategory->name }}</h4>
            <x-icon-button icon="pencil-square" :href="route('feature-categories.edit', $featureCategory)" />
        </header>
        @if ($featureCategory->memo)
            <p>memo: {{ $featureCategory->memo }}</p>
        @endif
        <div class=''>
            @foreach ($featureCategory->features as $feature)
                <section class='grid grid-cols-[1fr_4fr_70px_50px] gap-2'>
                    <h5 class='pt-3 font-bold'>{{ $feature->name }}</h5>
                    <p class='whitespace-pre-wrap pt-3'>{{ $feature->description }}</p>
                    <p class='pt-3'>{{ $feature->estimated_hours }} h</p>
                    <x-icon-button icon="pencil-square" :href="route('features.edit', $feature)" />
                </section>
            @endforeach
        </div>
        <x-icon-button icon='plus' :href="route('feature-categories.features.create', $featureCategory->id)" />
    </section>
</x-card>
