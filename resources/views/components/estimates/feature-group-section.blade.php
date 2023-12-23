<section class='p-4'>
    <header class='flex items-center justify-between'>
        <h3 class='text-xl font-bold'>{{ $featureGroup->name }}</h3>
        <x-icon-button icon="pencil-square" :href="route('feature-groups.edit', $featureGroup)" />
    </header>
    @if ($featureGroup->memo)
        <p>memo: {{ $featureGroup->memo }}</p>
    @endif
    <div class='mt-4 grid gap-2'>
        @foreach ($featureGroup->featureCategories as $featureCategory)
            <x-estimates.feature-category-section :featureCategory="$featureCategory" />
        @endforeach
    </div>
    <x-button class='mt-2' icon='plus' variant='text' :href="route('feature-groups.feature-categories.create', $featureGroup->id)">カテゴリ追加</x-button>
</section>
