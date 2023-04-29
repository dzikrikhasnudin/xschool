<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Semua Pengguna
            </h2>

            {{-- @can('manage-course')
            <button onclick="Livewire.emit('openModal', 'create-courses')"
                class="bg-teal-600 px-4 py-2 text-white rounded-full hover:bg-teal-700 text-center inline-block"> <i
                    class="fas fa-plus"></i>
                Kelas Baru</button>
            @endcan --}}
        </div>
    </x-slot>

    <div class="py-6">
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

                <form wire:submit.prevent="updateRole">
                    <h2 class="font-semibold my-auto text-md md:text-xl text-gray-800 leading-tight mb-3">
                        Ubah Peran Pengguna
                    </h2>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 mb-3">
                        <input type="hidden" wire:model="userId">
                        <div>
                            <input type="text" wire:model="name"
                                class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Nama Pengguna" required disabled>
                        </div>

                        <div class="flex flex-col lg:flex-row items-center">
                            <select wire:model="role_id"
                                class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option>Pilih Peran</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-5 lg:px-3 mt-3 lg:mt-0 lg:ml-2 text-xs font-semibold text-white bg-gray-800 tracking-widest rounded-lg border border-gray-700 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
                                SUBMIT
                            </button>
                        </div>
                    </div>
                </form>

                <hr class="my-4">

                <div class=" overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="p-2 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Lengkap
                                </th>
                                <th scope="col" class="px-6 py-3 hidden lg:block">
                                    Nama Pengguna
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Peran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $index = 1;
                            @endphp
                            @foreach ($users as $user)
                            <tr class="bg-white border-b 0">
                                <td scope="col" class="p-2 text-center">
                                    {{ $index++ }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4 hidden lg:block">
                                    {{ $user->username }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->getRoleNames()->first() == "Student" ? 'Siswa' :
                                    $user->getRoleNames()->first() }}
                                </td>
                                <td class="px-6 py-4 flex gap-2 text-white">
                                    {{-- Edit --}}
                                    <button wire:click="getUser({{ $user->id }})"
                                        class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 transition duration-300">
                                        <i class="fa-solid fa-pen-to-square m-auto "></i>
                                    </button>
                                    @php
                                    $userId = $user->id;
                                    @endphp
                                    <button wire:click="$emit('triggerDelete', {{ $userId }})"
                                        class="bg-red-600 px-2 py-1 rounded hover:bg-red-700 transition duration-300">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', userId => {
            Swal.fire({
                title: 'Yakin hapus data?',
                text: 'Data pengguna akan dihapus permanen!',
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
                    @this.call('destroy', userId)
             // success response
                    Swal.fire({title: 'Data pengguna berhasil dihapus!', icon: 'success'});
                } else {
                    Swal.fire({
                        title: 'Hapus data dibatalkan!',
                        icon: 'success'
                    });
                }
            });
        });
    })
</script>
@endpush