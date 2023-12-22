<x-layouts.user title='見積詳細'>
    <x-toolbar prevName="見積一覧" :prevLink="route('projects.estimates.index', $project->id)" :title="$estimate->name">
        <x-icon-button icon='pencil-square' :href="route('estimates.edit', $estimate->id)" />
    </x-toolbar>

    <section class='p-4'>
        <div>
            <p>{{ $estimate->name }}</p>
            <p class='whitespace-pre-wrap'>{{ $estimate->description }}</p>
        </div>
        <div class='grid gap-2'>
            @foreach ($estimate->featureGroups as $featureGroup)
                <section>
                    <header class='flex items-center justify-between'>
                        <h3 class='text-xl font-bold'>{{ $featureGroup->name }}</h3>
                        <x-icon-button icon="pencil-square" :href="route('feature-groups.edit', $featureGroup)" />
                    </header>
                    @if ($featureGroup->memo)
                        <p>memo: {{ $featureGroup->memo }}</p>
                    @endif
                    <section class='grid gap-2'>
                        @foreach ($featureGroup->featureCategories as $featureCategory)
                            <x-card>
                                <header class='flex items-center justify-between'>
                                    <h4 class='text-lg font-bold'>{{ $featureCategory->name }}</h4>
                                    <x-icon-button icon="pencil-square" :href="route('feature-categories.edit', $featureCategory)" />
                                </header>
                                @if ($featureCategory->memo)
                                    <p>memo: {{ $featureCategory->memo }}</p>
                                @endif
                            </x-card>
                        @endforeach
                    </section>
                    <x-icon-button icon='plus' :href="route('feature-groups.feature-categories.create', $featureGroup->id)" />
                </section>
            @endforeach
        </div>
        <x-button class='mt-4' :href="route('estimates.feature-groups.create', $estimate->id)">機能グループ作成</x-button>
    </section>
</x-layouts.user>
