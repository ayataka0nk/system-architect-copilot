@php
    if ($variant === 'filled') {
        $styles = [
            // 共通
            'relative',
            'overflow-hidden',
            'block',
            'bg-surface-container-highest',
            'rounded-xl',
            'p-4',
        ];
    }
    if ($href) {
        $styles = array_merge($styles, [
            // クリックアクションがあるとき
            'cursor-pointer',
            // ホバー
            'hover:after:absolute',
            'hover:after:inset-0',
            'hover:after:w-full',
            'hover:after:h-full',
            'hover:after:bg-opacity-8',
            'hover:after:bg-on-surface',
            'hover:drop-shadow-md',
            // フォーカス
            'focus:outline-none',
            'focus:after:absolute',
            'focus:after:inset-0',
            'focus:after:w-full',
            'focus:after:h-full',
            'focus:after:bg-opacity-10',
            'focus:after:bg-on-surface',
        ]);
    }
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($styles) }}>
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->class($styles) }}>
        {{ $slot }}
    </div>
@endif
