@php
    // {{-- blade-formatter-disable --}}
    $buttonBaseClasses = [
        'relative',
        'inline-flex',
        'align-bottom',
        'h-12',
        'w-12',
        'items-center',
        'justify-center',
        'group'
    ];
    $wrapperBaseClasses = [
        'relative',
        'inline-flex',
        'items-center',
        'justify-center',
        'overflow-hidden',
        'w-10',
        'h-10',
        'rounded-full',
        'text-on-surface-variant',
        'group-hover:after:absolute',
        'group-hover:after:full-width',
        'group-hover:after:full-height',
        'group-hover:after:inset-0',
        'group-hover:after:opacity-8',
        'group-hover:after:rounded-full',
        'group-hover:after:bg-on-surface-variant',
        'group-focus-visible:after:absolute',
        'group-focus-visible:after:full-width',
        'group-focus-visible:after:full-height',
        'group-focus-visible:after:inset-0',
        'group-focus-visible:after:opacity-10',
        'group-focus-visible:after:rounded-full',
        'group-focus-visible:after:bg-on-surface-variant',
        'group-focus-visible:outline-none',
        'group-active:after:absolute',
        'group-active:after:full-width',
        'group-active:after:full-height',
        'group-active:after:inset-0',
        'group-active:after:opacity-10',
        'group-active:after:rounded-full',
        'group-active:after:bg-on-surface-variant',

        // ripple
        'before:absolute',
        'before:full-width',
        'before:full-height',
        'before:inset-0',
        'before:pointer-events-none',
        'before:bg-no-repeat',
        'before:bg-center',
        'before:opacity-0',
        'before:transform',
        'before:scale-1000',
        'before:[transition:transform_.5s,opacity_1s]',
        'before:bg-ripple-surface-variant',
        'group-active:before:scale-0',
        'group-active:before:opacity-30',
        'group-active:before:duration-0',
    ];
    // {{-- blade-formatter-enable --}}
    if ($variant === 'standard') {
        $iconMode = $active ? 's' : 'o';
        $wrapperActiveClasses = match ($color) {
            'primary' => ['text-primary' => $active],
            'secondary' => ['text-secondary' => $active],
            'tertiary' => ['text-tertiary' => $active],
        };
    } else {
        throw new Exception('Invalid variant');
    }
    $iconName = 'heroicon-' . $iconMode . '-' . $icon;

@endphp

<button {{ $attributes->class($buttonBaseClasses) }}>
    <div @class(array_merge($wrapperBaseClasses, $wrapperActiveClasses))>
        <x-icon :name="$iconName" class="h-6 w-6" />
    </div>
</button>
