<x-app-layout>
    <x-slot name="title">Nilai Rapor</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Nilai Rapor {{ $siswa->name }}
            </h2>

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 mx-4 rounded-lg mb-3">
                <livewire:index-nilai-rapor :siswa="$siswa"></livewire:index-nilai-rapor>
            </div>
        </div>
    </div>

</x-app-layout>