<section @class([$class, 'grid grid-cols-[50px_1fr_4fr_60px_60px_50px] gap-2']) data-id="{{ $dataId }}">
    <x-icon-button icon='chevron-up-down' class='feature-handle' noRipple />
    <h5 class='pt-3 font-bold'>{{ $feature->name }}</h5>
    <p class='whitespace-pre-wrap pt-3'>{{ $feature->description }}</p>
    <p class='pt-3'>{{ $feature->estimated_hours }} h</p>
    <div>
        <div class='flex flex-col items-center'>
            @if ($feature->proposed_estimated_hours !== null)
                <p class='pt-3'>{{ $feature->proposed_estimated_hours }} h</p>
                <x-icon-button icon="check" type='button' wire:click='approve()' />
                <x-icon-button icon="x-mark" type='button' wire:click='reject()' />
            @endif
        </div>
    </div>
    <x-icon-button icon="pencil-square" :href="route('features.edit', $feature)" />
</section>
