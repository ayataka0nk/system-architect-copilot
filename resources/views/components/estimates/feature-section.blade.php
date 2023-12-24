<section {{ $attributes->class(['grid grid-cols-[50px_1fr_4fr_35px_50px_50px] gap-2']) }} x-data="{
    estimatedHours: '{{ $feature->estimated_hours }}',
    proposedEstimatedHours: '{{ $feature->proposed_estimated_hours }}'
}">
    <x-icon-button icon='chevron-up-down' class='feature-handle pt-3' noRipple />
    <h5 class='pt-3 font-bold'>{{ $feature->name }}</h5>
    <p class='whitespace-pre-wrap pt-3'>{{ $feature->description }}</p>
    <p class='pt-3' x-text="estimatedHours + ' h'"></p>
    <div>
        <div class='flex flex-col items-center' x-show="proposedEstimatedHours">
            <p class='pt-3' x-text="proposedEstimatedHours + ' h'"></p>
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
        </div>
    </div>
    <x-icon-button icon="pencil-square" :href="route('features.edit', $feature)" />
</section>
