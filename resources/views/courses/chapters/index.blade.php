<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Semua Kelas
            </h2>

            @can('manage-course')
                <button onclick="Livewire.emit('openModal', 'create-courses')"
                    class="bg-teal-600 px-4 py-2 text-white rounded-full hover:bg-teal-700 text-center inline-block"> <i
                        class="fas fa-plus"></i>
                    Kelas Baru</button>
            @endcan
        </div>
    </x-slot>

    <div class="py-6">
            <livewire:index-chapter></livewire:index-chapter>
    </div>

</x-app-layout>
