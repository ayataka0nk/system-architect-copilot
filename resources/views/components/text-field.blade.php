@php

@endphp

<div {{ $attributes->only('class') }}>
    @if ($label)
        <label class="block text-sm font-medium leading-6 text-gray-900 mb-1"
            for={{ $attributes->get('id') }}>{{ $label }}</label>
    @endif
    <input {{ $attributes->except('class') }}
        class="block w-full rounded-md border-0 py-1.5
        text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 p-3 outline-none">

</div>
