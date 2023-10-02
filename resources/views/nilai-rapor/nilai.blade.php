<div>
    @if (session()->has('message'))
    <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
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


    <div class="flex gap-2">
        {{-- Pagination Settings --}}
        <select wire:model="semester"
            class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
            <option value="1" selected>Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
        </select>
        {{-- Search Box --}}
        <div class="flex">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model="search" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  "
                    placeholder="Search">
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class=" overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-2 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mata Pelajaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nilai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Semester
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $index => $data)
                <tr class="bg-white border-b 0">
                    <td scope="col" class="p-2 text-center">
                        {{ $index + 1 }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->pelajaran->pelajaran }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->nilai }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->semester }}
                    </td>
                    <td class="px-6 py-4 flex gap-2 text-white">
                        {{-- Edit --}}
                        <button class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 transition duration-300">
                            <i class="fa-solid fa-pen-to-square m-auto "></i>
                        </button>
                        <button class="bg-red-600 px-2 py-1 rounded hover:bg-red-700 transition duration-300">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="py-3">
        {{ $users->links() }}
    </div> --}}
</div>