@php

@endphp

<div {{ $attributes->only('class') }}>
    @if ($label)
        <label class="block text-sm font-medium leading-6 text-gray-900 mb-1"
            for={{ $attributes->get('id') }}>{{ $label }}</label>
    @endif
    <textarea {{ $attributes->except('class') }}
        class="
    resize-none
    block w-full
    px-3 py-1.5
    rounded-md border-0 shadow-sm ring-1 ring-gray-300 
    placeholder:text-gray-400
    focus:outline-primary
    sm:text-sm sm:leading-6
    "></textarea>
</div>
