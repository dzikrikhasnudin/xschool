<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-4 mx-4 rounded-lg mb-3">

            @if (session()->has('message'))
                <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Berhasil!</span> {{ session('message') }}
                    </div>
                </div>
            @endif
            @if ($statusUpdate)
                <livewire:update-pelajaran :courses="$courses" :lessons="$lessons"></livewire:update-pelajaran>
            @else
                <livewire:tambah-pelajaran :courses="$courses" :lessons="$lessons"></livewire:tambah-pelajaran>
            @endif

            <hr class="my-4 divide-x-2">
            <div class=" overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Judul Pelajaran
                            </th>
                            <th scope="col" class="px-6 py-3">
                                BAB
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tautan Video
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $lesson->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $lesson->chapter->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $lesson->video }}
                                </td>
                                <td class="px-6 py-4 flex gap-2 text-white" x-data="{ scroll: () => { $el.scrollTo(0, $el.scrollHeight); } }">
                                    {{-- Edit --}}
                                    <button wire:click="getLesson({{ $lesson->id }})" x-intersect="scroll()"
                                        class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 transition duration-300">
                                        <i class="fa-solid fa-pen-to-square m-auto "></i>
                                    </button>

                                    {{-- Delete --}}
                                    <button wire:click='destroy({{ $lesson->id }})'
                                        class="bg-red-600 px-2 py-1 rounded hover:bg-red-700 transition duration-300">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
