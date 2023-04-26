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
                                <th scope="col" class="px-6 py-3">
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
                                <td class="px-6 py-4">
                                    {{ $user->username }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->getRoleNames()->first() == "Student" ? 'Siswa' :
                                    $user->getRoleNames()->first() }}
                                </td>
                                <td class="px-6 py-4 flex gap-2 text-white"
                                    x-data="{ scroll: () => { $el.scrollTo(0, $el.scrollHeight); } }">
                                    {{-- Edit --}}
                                    <button wire:click="getChapter({{ $user->id }})" x-intersect="scroll()"
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