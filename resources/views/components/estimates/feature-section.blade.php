<section {{ $attributes }} x-data="{
    estimatedHours: '{{ $feature->estimated_hours }}',
    estimatedHoursReason: '{{ $feature->estimated_hours_reason }}',
    proposedEstimatedHours: '{{ $feature->proposed_estimated_hours }}',
    proposedEstimatedHoursReason: '{{ $feature->proposed_estimated_hours_reason }}'
}">
    <x-card>
        <div class='flex items-center'>
            <x-icon-button icon='chevron-up-down' class='feature-handle' noRipple />
            <h5 class='font-bold'>{{ $feature->name }}</h5>
            <x-icon-button icon="pencil-square" :href="route('features.edit', $feature)" />
        </div>
        <p class='whitespace-pre-wrap'>{{ $feature->description }}</p>
        <div class='flex h-12 items-center gap-3'>
            <p>工数</p>
            <p x-show="estimatedHours" x-text="estimatedHours + ' h'"></p>
            <x-icon x-show="proposedEstimatedHours && estimatedHours" name='heroicon-s-chevron-double-left'
                class='w-5 text-primary' />
            <p x-show="proposedEstimatedHours" class='font-bold italic text-primary'>
                {{ $feature->proposed_estimated_hours }} h
            </p>
            <x-icon-button x-show="proposedEstimatedHours" icon="check" iconClass='text-green-700'
                x-on:click="
                axios.put('{{ route('features.approve-proposed-estimated-hours', $feature->id) }}')
                estimatedHours = proposedEstimatedHours;
                estimatedHoursReason = proposedEstimatedHoursReason;
                proposedEstimatedHours = null;
                proposedEstimatedHoursReason = null;
                " />
            <x-icon-button x-show="proposedEstimatedHours" icon="x-mark" iconClass='text-red-700'
                x-on:click="
                axios.put('{{ route('features.reject-proposed-estimated-hours', $feature->id) }}')
                proposedEstimatedHours = null;
                proposedEstimatedHoursReason = null;
                " />
        </div>
        <p x-show="estimatedHoursReason" @class(['text-on-surface-variant']) x-text="estimatedHoursReason">
        </p>
        <p x-show="proposedEstimatedHoursReason" @class(['text-on-surface-variant'])
            x-bind:class="{ 'text-primary font-bold italic': proposedEstimatedHours }"
            x-text="proposedEstimatedHoursReason">
        </p>

    </x-card>
</section>
