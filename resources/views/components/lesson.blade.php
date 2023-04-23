@props(['active'])

@php
    $classes = $active ?? false ? 'rounded-full px-5 py-1 flex mb-3 bg-slate-700 transition duration-300 text-white' : 'rounded-full bg-slate-200 px-5 py-1 flex mb-3 hover:bg-slate-700 hover:text-white transition duration-300';
    
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    <div class="p-2 my-auto mr-2 ">
        <i class="fa-regular fa-circle-play text-xl "></i>
    </div>
    <div class="text-left my-auto font-semibold">
        <h4>{{ $slot }}</h4>
    </div>
</a>
