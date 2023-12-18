@php
    // {{-- blade-formatter-disable --}}
    $commonClasses = [
        'relative',
        'inline-flex',
        'items-center',
        'align-bottom',
        'justify-center',
        'gap-2',
        'overflow-hidden',
        'hover:after:absolute',
        'hover:after:inset-0',
        'hover:after:full-width',
        'hover:after:opacity-8',
        'active:after:absolute',
        'active:after:inset-0',
        'active:after:full-width',
        'active:after:opacity-10',
        'before:absolute',
        'before:inset-0',
        'before:full-width',
        'before:pointer-events-none',
        'before:bg-no-repeat',
        'before:bg-center',
        'before:opacity-0',
        'before:transform',
        'before:scale-1000',
        'before:[transition:transform_.5s,opacity_1s]',
        'active:before:scale-0',
        'active:before:opacity-30',
        'active:before:duration-0',
        'focus-visible:after:absolute',
        'focus-visible:after:inset-0',
        'focus-visible:after:full-width',
        'focus-visible:after:opacity-10',
        'focus-visible:outline-none'
    ];
    $variantClasses = match ($variant) {
            'filled' => [
                'h-10',
                'rounded-3xl',
                'px-6',
                'text-sm',
                'font-semibold',
                'shadow-sm',
                'before:bg-ripple-white',
            ],
            'outlined' => [
                'bg-surface',
                'h-10',
                'rounded-3xl',
                'px-6',
                'text-sm',
                'font-semibold',
                'shadow-sm',
                'ring-1',
                'ring-outline'
            ],
            'text' => [
                'h-10',
                'rounded-3xl',
                'px-3',
                'text-sm',
                'font-semibold'
            ]
    };

    if ($variant === 'filled') {
        $colorClasses = match ($color) {
            'primary' => [
                'bg-primary',
                'text-on-primary',
                'hover:after:bg-on-primary',
                'active:after:bg-on-primary',
                'focus-visible:after:bg-on-primary'
            ],
            'secondary' => [
                'bg-secondary',
                'text-on-secondary',
                'hover:after:bg-on-secondary',
                'active:after:bg-on-secondary',
                'focus-visible:after:bg-on-secondary'
            ],
            'tertiary' => [
                'bg-tertiary',
                'text-on-tertiary',
                'hover:after:bg-on-tertiary',
                'active:after:bg-on-tertiary',
                'focus-visible:after:bg-on-tertiary'
            ]
        };
    } elseif ($variant === 'outlined') {
        $colorClasses = match ($color) {
            'primary' => [
                'text-primary',
                'hover:after:bg-primary',
                'active:after:bg-primary',
                'focus-visible:after:bg-primary',
                'before:bg-ripple-primary'
            ],
            'secondary' => [
                'text-secondary',
                'hover:after:bg-secondary',
                'active:after:bg-secondary',
                'focus-visible:after:bg-secondary',
                'before:bg-ripple-secondary'
            ],
            'tertiary' => [
                'text-tertiary',
                'hover:after:bg-tertiary',
                'active:after:bg-tertiary',
                'focus-visible:after:bg-tertiary',
                'before:bg-ripple-tertiary'
            ]
        };
    } elseif ($variant === 'text') {
        $colorClasses = match ($color) {
            'primary' => [
                'text-primary',
                'hover:after:bg-primary',
                'active:after:bg-primary',
                'focus-visible:after:bg-primary',
                'before:bg-ripple-primary'
            ],
            'secondary' => [
                'text-secondary',
                'hover:after:bg-secondary',
                'active:after:bg-secondary',
                'focus-visible:after:bg-secondary',
                'before:bg-ripple-secondary'
            ],
            'tertiary' => [
                'text-tertiary',
                'hover:after:bg-tertiary',
                'active:after:bg-tertiary',
                'focus-visible:after:bg-tertiary',
                'before:bg-ripple-tertiary'
            ]
        };
    }
  // {{-- blade-formatter-enable --}}

    if ($icon !== null) {
        $classesWithIcon = ['pl-4'];
    } else {
        $classesWithIcon = [];
    }
    $iconName = 'heroicon-o-' . $icon;
    $class = implode(' ', array_merge($commonClasses, $variantClasses, $colorClasses, $classesWithIcon));
@endphp

<button {{ $attributes->class([$class]) }}>
    @if ($icon !== null)
        <x-icon :name="$iconName" class="h-6 w-6" />
    @endif
    <div>{{ $slot }}</div>
</button>
