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

    <div class="overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 w-full">
                <tr>
                    <th scope="col" class="p-2 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Siswa
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Rata-Rata
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Semester 1
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Semester 2
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Semester 3
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Semester 4
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Semester 5
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Semester 6
                    </th>

                </tr>
            </thead>
            <tbody>
                @php
                $nomor = 1
                @endphp
                @foreach ($users as $siswa)
                <tr class="bg-white border-b 0">
                    <td scope="col" class="p-2 text-center">
                        {{ $nomor++ }}
                    </td>
                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a class="hover:text-teal-400 transition duration-200 hover:underline hover:font-semibold"
                            href="{{ route('nilai-rapor.show', getStudent($siswa)->username) }}">{{
                            ucwords(strtolower(getStudent($siswa)->name))
                            }}</a>
                    </th>
                    <td class="px-6 py-3 text-center">
                        {{ getAverage($siswa) }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        {{ getAverage($siswa, 1) }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        {{ getAverage($siswa, 2) }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        {{ getAverage($siswa, 3) }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        {{ getAverage($siswa, 4) }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        {{ getAverage($siswa, 5) }}
                    </td>
                    <td class="px-6 py-3 text-center">
                        {{ getAverage($siswa, 6) }}
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>