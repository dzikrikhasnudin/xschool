<div>

    <x-slot name="title">Nilai Tryout</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Nilai Tryout #{{ $batch }}
            </h2>

            @can('user_show')
            <a href="{{ route('nilai-tryout.create') }}"
                class="bg-teal-600 px-4 py-2 text-white rounded-full hover:bg-teal-700 text-center inline-block"> <i
                    class="fas fa-plus"></i>
                Tambah</a>
            @endcan
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
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

                <div class="flex flex-wrap gap-2">
                    {{-- Pagination Settings --}}
                    <select wire:model="paginate"
                        class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>

                    <select wire:model="sort"
                        class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
                        <option value="ASC">Urutkan Terendah</option>
                        <option value="DESC" selected>Urutkan Tertinggi</option>
                    </select>

                    {{-- Search Box --}}
                    <div class="flex lg:ml-auto">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                    Peringkat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Siswa
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Jumlah Benar
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Rata-rata
                                </th>
                                @can('chapter_create')
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($scores as $rank => $score)
                            <tr class="bg-white border-b" wire:key='{{ $score->id }}'>
                                <td scope="col" class="p-2 text-center">
                                    {{ $rank + 1 }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ ucwords(strtolower($score->user->name)) }}
                                </th>

                                <td class="px-6 py-4 text-center">
                                    {{ $score->jumlah_benar }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $score->rata_rata }}
                                </td>
                                @can('chapter_create')
                                <td class="px-6 py-4 flex gap-2 text-white justify-center">
                                    @php
                                    $scoreId = $score->id;
                                    @endphp
                                    {{-- Edit --}}
                                    <a href="{{ route('nilai-tryout.edit', $scoreId) }}"
                                        class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 transition duration-300">
                                        <i class="fa-solid fa-pen-to-square m-auto "></i>
                                    </a>

                                    <button wire:click="$emit('triggerDelete', {{ $scoreId }})"
                                        class="bg-red-600 px-2 py-1 rounded hover:bg-red-700 transition duration-300">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                                @endcan

                                @empty
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 text-center" colspan="8">Belum ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="py-3">
                    {{ $scores->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', scoreId => {
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
                    @this.call('destroy', scoreId)
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