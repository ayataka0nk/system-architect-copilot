@php
    if ($variant === 'filled') {
        $labelStyles = [
            // 共通
            'absolute',
            'cursor-pointer',
            // 入力値無し
            'peer-placeholder-shown:top-3.5',
            'peer-placeholder-shown:text-lg',
            // 入力値あり
            'top-2',
            'text-xs',
            // フォーカス
            'peer-focus:top-2',
            'peer-focus:text-xs',
        ];

        if ($icon) {
            $labelStyles = array_merge($labelStyles, [
                // 入力値無し
                'peer-placeholder-shown:left-13',
                // 入力値あり
                'left-13',
            ]);
        } else {
            $labelStyles = array_merge($labelStyles, [
                // 入力値無し
                'peer-placeholder-shown:left-4',
                // 入力値あり
                'left-4',
            ]);
        }

        if ($error) {
            $labelStyles = array_merge($labelStyles, [
                // 入力値無し
                'peer-placeholder-shown:text-error',
                // 入力値あり
                'text-error',
                // フォーカス
                'peer-focus:text-error',
            ]);
        } else {
            $labelStyles = array_merge($labelStyles, [
                // 入力値無し
                'peer-placeholder-shown:text-on-surface-variant',
                // 入力値あり
                'text-on-surface-variant',
                // フォーカス
                'peer-focus:text-primary',
            ]);
        }

        $inputStyles = [
            // 共通
            'peer',
            'w-full',
            'block',
            'pr-4',
            'pt-6',
            'pb-2',
            'rounded-t',
            'bg-surface-container-highest',
            'outline-none',
            'placeholder-transparent',
            'shadow-underline-thin',
            'focus:shadow-underline-thick',
            'line-height-0',
            'cursor-pointer',
        ];

        if ($error) {
            $inputStyles = array_merge($inputStyles, [
                // エラーあり
                'shadow-error',
                'focus:shadow-error',
            ]);
        } else {
            $inputStyles = array_merge($inputStyles, [
                // エラーなし
                'shadow-primary',
                'focus:shadow-primary',
            ]);
        }

        if ($icon) {
            $inputStyles[] = 'pl-13';
        } else {
            $inputStyles[] = 'pl-4';
        }

        if ($multiline) {
            $inputStyles[] = 'resize-none';
        }

        $supportingTextStyles = [
            // 共通
            'text-xs',
            'mt-1',
            'leading-none',
            'pl-4',
        ];

        if ($error) {
            $supportingTextStyles[] = 'text-error';
        } else {
            $supportingTextStyles[] = 'text-on-surface-variant';
        }
    }

    $iconName = 'heroicon-o-' . $icon;

@endphp

<div {{ $attributes->class(['relative'])->only('class') }} x-data="{
    autoresize(event) {
        const textarea = event.target;
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }
}">
    <div
        class='hover:after:full-width relative hover:after:pointer-events-none hover:after:absolute hover:after:inset-0 hover:after:bg-on-surface hover:after:opacity-8'>
        @if ($multiline)
            <textarea {{ $attributes->merge(['placeholder' => 'dummy'])->except('class') }} @class($inputStyles)
                x-on:input="autoresize" rows="1"></textarea>
        @else
            <input {{ $attributes->merge(['placeholder' => 'dummy'])->except('class') }} @class($inputStyles)>
        @endif

        @if ($label)
            <label @class($labelStyles) for="{{ $attributes->get('id') }}">{{ $label }}</label>
        @endif
        @if ($icon)
            <x-icon :name="$iconName" class="pointer-events-none absolute left-3 top-4 h-6 w-6" />
        @endif
    </div>
    <p @class($supportingTextStyles)>
        @if ($supportingText)
            {{ $supportingText }}
        @endif
        @if ($error)
            {{ $error }}
        @endif
    </p>
</div>
