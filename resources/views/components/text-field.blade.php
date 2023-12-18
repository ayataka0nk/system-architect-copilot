@php
    // {{-- blade-formatter-disable --}}
    if($variant === 'filled') {
        $rootBaseClasses = [
            'relative',
 
        ];
        $labelBaseClasses = [
            'absolute',
            'text-primary',
            'cursor-pointer',
            // 入力値無し
            'peer-placeholder-shown:text-on-surface-variant',
            'peer-placeholder-shown:text-lg',
            'peer-placeholder-shown:top-3.5',
            // 入力値あり
            'top-2',
            'text-xs',
            // フォーカス
            'peer-focus:text-primary',
            'peer-focus:top-2',
        ];
        $inputBaseClasses = [
   
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
            'shadow-primary',
            'focus:shadow-underline-thick',
            'focus:shadow-primary',
            'line-height-0',
            'cursor-pointer',
        ];
        $supportingTextBaseClasses = [
            'h-4',
            'text-xs',
            'text-on-surface-variant',
            'mt-1',
            'leading-none',
            'pl-4'
        ];

        if($error){
            $labelBaseClasses[] = 'peer-placeholder-shown:text-error';
            $labelBaseClasses[] = 'text-error';
            $labelBaseClasses[] = 'peer-focus:text-error';
            $inputBaseClasses[] = 'shadow-error';
            $inputBaseClasses[] = 'focus:shadow-error';
            $supportingTextBaseClasses[] = 'text-error';
        }
      

        if ($icon === null) {
            $labelIconClasses = [
                // 入力値無し
                'peer-placeholder-shown:left-4',
                // 入力値あり
                'left-4',
                // フォーカス
                'peer-focus:top-2',
                'peer-focus:text-xs',
            ];
            $inputIconClasses = [
                'pl-4'
            ];

        } else {
            $labelIconClasses = [
                // 入力値無し
                'peer-placeholder-shown:left-13',
                // 入力値あり
                'left-13',
                // フォーカス
                'peer-focus:text-xs',
            ];
            $inputIconClasses = [
                'pl-13'
            ];

        }
    }

    $iconName = 'heroicon-o-' . $icon;

    if ($multiline) {
        $inputMultilineClasses = ['resize-none'];
    } else {
        $inputMultilineClasses = [];
    }
    $rootClass = implode(' ', $rootBaseClasses);
    $inputClass = implode(' ', array_merge($inputBaseClasses, $inputIconClasses, $inputMultilineClasses));
    $labelClass = implode(' ', array_merge($labelBaseClasses, $labelIconClasses));
    $supportingIconClass = implode(' ', array_merge($supportingTextBaseClasses));
  // {{-- blade-formatter-enable --}}
@endphp

<div {{ $attributes->class($rootClass)->only('class') }} x-data="{
    autoresize(event) {
        const textarea = event.target;
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }
}">
    <div
        class='hover:after:full-width relative hover:after:pointer-events-none hover:after:absolute hover:after:inset-0 hover:after:bg-on-surface hover:after:opacity-8'>
        @if ($multiline)
            <textarea {{ $attributes->merge(['placeholder' => 'dummy'])->except('class') }} class ="{{ $inputClass }}"
                x-on:input="autoresize" rows="1"></textarea>
        @else
            <input {{ $attributes->merge(['placeholder' => 'dummy'])->except('class') }} class="{{ $inputClass }}">
        @endif

        @if ($label)
            <label class="{{ $labelClass }}" for="{{ $attributes->get('id') }}">{{ $label }}</label>
        @endif
        @if ($icon)
            <x-icon :name="$iconName" class="pointer-events-none absolute left-3 top-4 h-6 w-6" />
        @endif
    </div>
    <p class="{{ $supportingIconClass }}">
        @if ($supportingText)
            {{ $supportingText }}
        @endif
        @if ($error)
            {{ $error }}
        @endif
    </p>
</div>
