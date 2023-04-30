<x-app-layout>
        <x-slot name="title">Pelajaran</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Semua Pelajaran
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <livewire:index-pelajaran></livewire:index-pelajaran>
    </div>

</x-app-layout>
