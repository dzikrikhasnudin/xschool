<x-app-layout>
    <x-slot name="title">{{ $data->name }}</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                {{ $course->name }}
            </h2>

            <a href="{{ route('kelas.index') }}"
                class="bg-teal-600 px-4 py-2 text-white rounded-full hover:bg-teal-700 text-center inline-block transition duration-300 ease-in-out">Semua
                Kelas</a>
        </div>
    </x-slot>

    <div class="py-6 lg:flex lg:flex-row md:max-w-7xl mx-auto flex-col-reverse flex">
        <div class="w-full mx-auto sm:px-6 lg:px-2 lg:w-2/5">

            @can('course_edit')
            <div class="bg-white p-4 mx-4 rounded-lg mb-3 flex justify-between">
                <p class="text-lg font-semibold">Pengelolaan Kelas</p>
                <div class="flex gap-1 text-white">
                    <a href="#" class="bg-teal-500 px-2 py-1 rounded hover:bg-teal-700 transition duration-300">
                        <i class="fa-solid fa-file-circle-plus"></i>
                    </a>
                    <a href="#" class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 transition duration-300">
                        <i class="fa-solid fa-pen-to-square m-auto "></i>
                    </a>
                    <a href="#" class="bg-red-600 px-2 py-1 rounded hover:bg-red-700 transition duration-300">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
            </div>

            <hr class="mt-5 mb-3 border border-gray-300 ">
            @endcan
            @forelse ($course->chapters as $chapter)
            @if ($chapter->lessons->count())
            <x-chapter title="{{ $chapter->name }}" totalVideo="{{ $chapter->lessons->count() }}"
                totalModul="{{ $chapter->moduls->count() }}">
                <div x-show="expanded" x-collapse class="mx-3 mt-4">
                    @foreach ($chapter->lessons as $lesson)
                    <x-lesson
                        href="{{ route('course.playing', ['course' => $course->slug, 'lesson' => $lesson->id]) }}">
                        {{ $lesson->name }}
                    </x-lesson>
                    @endforeach

                    @if ($chapter->moduls->count())
                    @foreach ($chapter->moduls as $modul)
                    <a href="{{ $modul->file }}" target="_blank"
                        class="rounded-full bg-slate-200 px-5 py-1 flex mb-3 hover:bg-slate-700 hover:text-white transition duration-300">
                        <div class="p-2 my-auto mr-2 ">
                            <i class="fa-sharp fa-solid fa-download"></i>
                        </div>
                        <div class="text-left my-auto font-semibold cursor-pointer">
                            <h4>{{ $modul->name }}</h4>
                        </div>
                    </a>
                    @endforeach
                    @endif
                </div>
            </x-chapter>
            @endif
            @empty
            <div class="bg-white p-4 mx-4 rounded-lg mb-3 ">
                <div class="focus:bg-none">
                    <figure>
                        <img src="{{ asset('assets/img/result-not-found.png') }}" alt="result not found"
                            class="w-full object-cover px-4">
                        <figcaption class="flex flex-col text-center justify-center py-4">
                            <h4 class="font-bold text-2xl text-slate-800">Oops! Data Tidak Ditemukan</h4>
                            <a href="{{ route('kelas.index') }}"
                                class="bg-slate-400 px-4 py-2 text-white rounded-full hover:bg-slate-600 text-center mt-3 w-1/2 mx-auto transition duration-300 ease-in-out">Kembali</a>
                        </figcaption>
                    </figure>

                </div>
            </div>

            @endforelse
        </div>
        <div
            class="w-full mx-auto p-4 mb-3 bg-white overflow-hidden shadow-xl sm:rounded-lg lg:w-full  lg:block lg:mr-6">
            <iframe class="w-full aspect-video p-0 lg:p-4" src="https://www.youtube.com/embed{{ $videoId }}?autoplay=0"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>

            <div class="mt-4">
                <h3 class="text-2xl font-bold ">{{ $data->name }}</h3>
                <h4>Materi Bagian : {{ $data->chapter->name }}</h4>
            </div>
            <div class="flex justify-between text-center gap-4 mt-4">
                @isset($prev)
                <a href="{{ $prev->id }}"
                    class="font-semibold bg-slate-200 w-full p-2 rounded-full hover:bg-slate-300 transition duration-300">Prev</a>
                @endisset
                @isset($next)
                <a href="{{ $next->id }}"
                    class="font-semibold bg-teal-800 w-full p-2 rounded-full text-white hover:bg-teal-700 transition duration-300">Next
                    Video
                </a>
                @endisset
            </div>
        </div>
    </div>
</x-app-layout>