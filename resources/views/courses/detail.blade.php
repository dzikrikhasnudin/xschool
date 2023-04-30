<x-app-layout>
    <x-slot name="title">{{ $course->name }}</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight mb-3">
                {{ $course->name }}
            </h2>

            <a href="{{ route('kelas.index') }}"
                class="bg-teal-600 px-4 py-2 text-white rounded-full hover:bg-teal-700 text-center inline-block transition duration-300 ease-in-out">Semua
                Kelas
            </a>
        </div>
    </x-slot>

    <div class="py-6 lg:flex lg:flex-row flex-col-reverse flex">
        <div class="w-full mx-auto sm:px-6 lg:px-2 lg:w-2/5">
            @can('course_update')
            @if ($course->status == 'draft')
            <div class="flex p-4 mb-4 text-sm mx-4 text-yellow-800 rounded-lg bg-yellow-50 " role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Peringatan!</span> Kelas ini masih berupa draft dan belum
                    dipublikasikan.
                </div>
            </div>
            @endif

            <div class="bg-white p-4 mx-4 rounded-lg mb-3" x-data="{ open: false }">
                <div class="flex justify-between">
                    <p class="text-lg font-semibold">Pengelolaan Kelas</p>
                    <div class="flex gap-1 text-white">

                        {{-- Add --}}
                        <button data-modal-target="tambah-data" data-modal-toggle="tambah-data"
                            class="bg-teal-500 px-2 py-1 rounded hover:bg-teal-700 transition duration-300">
                            <i class="fa-solid fa-file-circle-plus"></i>
                        </button>

                        {{-- Edit --}}
                        <button @click="open = ! open"
                            class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 transition duration-300">
                            <i class="fa-solid fa-pen-to-square m-auto "></i>
                        </button>

                        {{-- Delete --}}
                        <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                            class="bg-red-600 px-2 py-1 rounded hover:bg-red-700 transition duration-300">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>

                {{-- Edit Kelas --}}
                @include('courses._edit')

            </div>

            <hr class="mt-5 mb-4 border border-gray-300 ">

            @endcan

            @forelse ($course->chapters as $chapter)

            @if ($chapter->lessons->isNotEmpty() and Auth::user()->hasRole('Student'))
            <x-chapter title="{{ $chapter->name }}" totalVideo="{{ $chapter->lessons->count() }}">
                <div x-show="expanded" x-collapse class="mx-3 mt-4">
                    @forelse ($chapter->lessons as $lesson)
                    <x-lesson
                        href="{{ route('course.playing', ['course' => $course->slug, 'lesson' => $lesson->id]) }}">
                        {{ $lesson->name }}
                    </x-lesson>
                    @empty
                    <div>Belum ada video</div>
                    @endforelse
                </div>
            </x-chapter>
            @elseif (Auth::user()->hasRole('Mentor') or Auth::user()->hasRole('SuperAdmin'))
            <x-chapter title="{{ $chapter->name }}" totalVideo="{{ $chapter->lessons->count() }}">
                <div x-show="expanded" x-collapse class="mx-3 mt-4">
                    @forelse ($chapter->lessons as $lesson)
                    <x-lesson
                        href="{{ route('course.playing', ['course' => $course->slug, 'lesson' => $lesson->id]) }}">
                        {{ $lesson->name }}
                    </x-lesson>
                    @empty
                    <div>Belum ada video</div>
                    @endforelse
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
                            <h4 class="font-bold text-2xl text-slate-800">Oops! Materi belum tersedia</h4>
                            <a href="{{ route('kelas.index') }}"
                                class="bg-slate-400 px-4 py-2 text-white rounded-full hover:bg-slate-600 text-center mt-3 w-1/2 mx-auto transition duration-300 ease-in-out">Kembali</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
            @endforelse
        </div>

        {{-- Video Player --}}

        <div
            class="w-full mx-auto p-4 mb-3 bg-white overflow-hidden shadow-xl sm:rounded-lg lg:w-full lg:block lg:mr-6">
            <iframe class="w-full aspect-video p-0 lg:p-4" src="https://www.youtube.com/embed/EV2PnK-zwlA?autoplay=0"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>

            <div class="mt-4">
                <h3 class="text-2xl font-bold ">Informasi Umum SNBT 2023</h3>
            </div>

        </div>
        @can('course_update')
        @push('modal')
        <div id="delete-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <form action="{{ route('kelas.destroy', $course->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="delete-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu yakin akan
                                menghapus kelas ini?</h3>

                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Ya, hapus saja
                            </button>

                            <button data-modal-hide="delete-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,
                                batalkan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @include('courses._add')
        @endpush
        @endcan
</x-app-layout>