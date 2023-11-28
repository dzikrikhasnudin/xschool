<x-app-layout>
    <x-slot name="title">Kelas</x-slot>
    <x-slot name="header">
        <div class="flex justify-between  max-w-5xl items-center">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Semua Kelas
            </h2>

            @can('course_create')
            <button onclick="Livewire.emit('openModal', 'create-courses')"
                class="bg-teal-600 px-4 py-2 text-white rounded-full hover:bg-teal-700 text-center inline-block"> <i
                    class="fas fa-plus"></i>
                Kelas Baru</button>
            @endcan
        </div>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-4">
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mx-4 md:grid-cols-2">
                @foreach ($courses as $course)
                <div
                    class="bg-white text-center pb-4 rounded-xl hover:bg-slate-200 transition-all duration-300 overflow-hidden px-4">
                    <a href="{{ route('kelas.show', $course->slug) }}">
                        <figure>
                            @if ($course->thumbnail)
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" alt=""
                                class="w-full object-cover mx-auto">
                            @else
                            <img src="{{ asset('assets/img/no-image.png') }}" alt=""
                                class="w-full object-cover mx-auto">
                            @endif
                        </figure>
                        <h3 class="text-md md:text-lg lg:text-xl font-bold leading-5 my-auto line-clamp-2">
                            <span class="font-light">{{ $course->status == 'draft' ?
                                'Draft - ' : '' }}</span> {{ $course->name }}
                        </h3>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>