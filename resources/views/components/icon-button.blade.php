@php
    $buttonBaseClasses = [
        // base
        'relative',
        'inline-flex',
        'align-bottom',
        'h-12',
        'w-12',
        'items-center',
        'justify-center',
        'group',
        'focus-visible:outline-none',
    ];
    $wrapperBaseClasses = ['relative', 'inline-flex', 'items-center', 'justify-center', 'overflow-hidden', 'w-10', 'h-10', 'rounded-full'];

    if ($attributes->get('disabled')) {
        $actionClasses = [];
    } else {
        $actionClasses = [
            // hover
            'group-hover:after:absolute',
            'group-hover:after:full-width',
            'group-hover:after:full-height',
            'group-hover:after:inset-0',
            'group-hover:after:opacity-8',
            'group-hover:after:rounded-full',
            // focus
            'group-focus-visible:after:absolute',
            'group-focus-visible:after:full-width',
            'group-focus-visible:after:full-height',
            'group-focus-visible:after:inset-0',
            'group-focus-visible:after:opacity-10',
            'group-focus-visible:after:rounded-full',
            'group-focus-visible:outline-none',
            // active
            'group-active:after:absolute',
            'group-active:after:full-width',
            'group-active:after:full-height',
            'group-active:after:inset-0',
            'group-active:after:opacity-10',
            'group-active:after:rounded-full',
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
            'before:[transition:transform_.7s,opacity_1.2s]',
            'before:bg-ripple-surface-variant',
            'group-active:before:scale-0',
            'group-active:before:opacity-30',
            'group-active:before:duration-0',
        ];
    }

    if ($variant === 'standard') {
        $iconMode = $active ? 's' : 'o';
        $variantClasses = [
            // base
            'text-on-surface-variant',
            // hover
            'group-hover:after:bg-on-surface-variant',
            // focus
            'group-focus-visible:after:bg-on-surface-variant',
            // active
            'group-active:after:bg-on-surface-variant',
            // ripple
            'before:bg-ripple-surface-variant',
            // toggle active
            'text-primary' => $active,
        ];
        $wrapperActiveClasses = match ($color) {
            'primary' => ['text-primary' => $active],
            'secondary' => ['text-secondary' => $active],
            'tertiary' => ['text-tertiary' => $active],
        };
    } elseif ($variant === 'filled') {
        $iconMode = $active ? 's' : 'o';
        $variantClasses = [
            // base
            'bg-primary',
            'text-on-primary',
            // hover
            'group-hover:after:bg-on-primary',
            // focus
            'group-focus-visible:after:bg-on-primary',
            // active
            'group-active:after:bg-on-primary',
            // ripple
            'before:bg-ripple-white',
            // toggle active
            'bg-primary' => $active,
        ];
    } elseif ($variant === 'filled-tonal') {
        $iconMode = $active ? 's' : 'o';
        $variantClasses = [];
        $wrapperActiveClasses = match ($color) {
            'primary' => ['bg-primary' => $active],
            'secondary' => ['bg-secondary' => $active],
            'tertiary' => ['bg-tertiary' => $active],
        };
    } else {
        throw new Exception('Invalid variant');
    }
    $iconName = 'heroicon-' . $iconMode . '-' . $icon;
    if ($attributes->get('disabled')) {
        $wrapperBaseClasses[] = 'opacity-38';
    }

@endphp

@if ($href)
    <a {{ $attributes->class($buttonBaseClasses) }} href="{{ $href }}">
        <div @class(array_merge($wrapperBaseClasses, $variantClasses, $actionClasses))>
            <x-icon :name="$iconName" class="h-6 w-6" />
        </div>
    </a>
@else
    <button {{ $attributes->class($buttonBaseClasses) }}>
        <div @class(array_merge($wrapperBaseClasses, $variantClasses, $actionClasses))>
            <x-icon :name="$iconName" class="h-6 w-6" />
        </div>
    </button>
@endif
