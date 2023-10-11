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


    <div class="flex gap-2 items-center justify-between">
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

        @if (Auth::user()->getRoleNames()->first() == "Student")
        <!-- Dropdown menu -->
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
            class="text-white bg-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">Aksi<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <div id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="{{ route('nilai-rapor.create') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fa-solid fa-file-circle-plus mr-2 "></i>Tambah
                        Nilai</a>
                </li>
                <li>
                    <a href="{{ route('nilai-rapor.edit', $semester) }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fa-solid fa-pen-to-square mr-2 "></i>Edit - Semester {{ $semester }}</a>
                </li>
                <li>
                    <a wire:click="$emit('triggerDelete', {{ $semester }})"
                        class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fa-solid fa-trash mr-2"></i> Hapus - Semester {{ $semester }}</a>
                </li>

            </ul>
        </div>
        @endif


    </div>

    <hr class="my-4">

    <div class=" overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 w-full">
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

                </tr>
            </thead>
            <tbody>
                @forelse ($nilai as $index => $data)
                @if ($data->nilai >= 0)
                <tr class="bg-white border-b 0">

                    <td scope="col" class="p-2 text-center">
                        {{ $index + 1 }}
                    </td>
                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $data->pelajaran->nama }}
                    </th>
                    <td class="px-6 py-3">
                        {{ $data->nilai }}
                    </td>
                    <td class="px-6 py-3">
                        {{ $data->semester }}
                    </td>

                </tr>
                @endif
                @empty
                @if (Auth::user()->id == $siswa->id)
                <tr>
                    <th scope="col" colspan="5" class="col-span-2 p-2 text-lg text-center pt-4">
                        Anda belum melakukan input Nilai Rapor Semester {{ $semester }}
                    </th>

                </tr>
                <tr>
                    <th scope="col" colspan="5" class="col-span-2 p-2 text-center pb-4">
                        <a href="{{ route('nilai-rapor.create') }}"
                            class="text-white bg-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                            Nilai
                        </a>
                    </th>

                </tr>
                @else
                <tr>
                    <th scope="col" colspan="5" class="col-span-2 text-lg text-center py-4">
                        {{ $siswa->name . ' belum melakukan input Nilai Rapor Semester ' . $semester }}
                    </th>

                </tr>
                @endif
                @endforelse
                <tr class="bg-gray-50">
                    <th scope="col" colspan="2" class="col-span-2 p-2 text-center">
                        Rata-rata
                    </th>
                    <th scope="col" colspan="3" class="px-6 py-3">
                        {{ getAverage($siswa->id, $semester) }}
                    </th>

                </tr>
            </tbody>
        </table>
    </div>

</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', semester => {
            Swal.fire({
                title: 'Yakin hapus data?',
                text: 'Data nilai ini akan dihapus permanen!',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#E12425',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Hapus saja!',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
            //if user clicks on delete
                if (result.value) {
            // calling destroy method to delete
                    @this.call('destroy', semester)
            // success response
                    Swal.fire({title: 'Data nilai berhasil dihapus!', icon: 'success'});
                } else {
                    Swal.fire({
                        title: 'Hapus data nilai dibatalkan!',
                        icon: 'success'
                    });
                }
            });
        });
    })
</script>
@endpush