<section data-id={{ $dataId }}>
    <x-card>
        <div class='flex items-center'>
            <x-icon-button icon='chevron-up-down' class='feature-handle' noRipple />
            <h5 class='font-bold'>{{ $feature->name }}</h5>
            <x-icon-button icon="pencil-square" :href="route('features.edit', $feature)" />
        </div>

        <p class='whitespace-pre-wrap'>{{ $feature->description }}</p>

        <div class='flex h-12 items-center gap-3 sm:ml-12'>
            <p>工数</p>

            @if ($feature->estimated_hours !== null)
                <p>{{ $feature->estimated_hours }} h</p>
            @endif

            @if ($feature->proposed_estimated_hours !== null)
                @if ($feature->estimated_hours !== null)
                    <x-icon name='heroicon-s-chevron-double-left' class='w-5 text-primary' />
                @endif
                <p class='font-bold italic text-primary'>
                    {{ $feature->proposed_estimated_hours }} h
                </p>
                <x-icon-button icon="check"
                x-on:click="
                axios.put('{{ route('features.approve-proposed-estimated-hours', $feature->id) }}')
                estimatedHours = proposedEstimatedHours
                proposedEstimatedHours = null
                " />
            <x-icon-button icon="x-mark"
                x-on:click="
                axios.put('{{ route('features.reject-proposed-estimated-hours', $feature->id) }}')
                proposedEstimatedHours = null
                " />
            @endif
        </div>
    </x-card>
</section>
