@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex flex-col items-center justify-center px-5 bg-gray-100 text-teal-500 group'
: 'inline-flex flex-col text-gray-500 items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>