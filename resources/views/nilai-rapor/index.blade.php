<x-app-layout>
    <x-slot name="title">Nilai Rapor</x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Nilai Rapor Siswa
            </h2>

            @if(Auth::user()->getRoleNames()->first() !== "Student")
            <a href="{{ route('nilai-rapor.create') }}"
                class="bg-teal-600 px-4 py-2 text-white rounded-full hover:bg-teal-700 text-center inline-block"> <i
                    class="fas fa-plus"></i>
                Tambah Nilai</a>
            @endif

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 mx-4 rounded-lg mb-3">
                @if (Auth::user()->getRoleNames()->first() == "SuperAdmin")
                <livewire:rapor-siswa />
                @else
                <livewire:index-nilai-rapor></livewire:index-nilai-rapor>
                @endif

            </div>
        </div>
    </div>

</x-app-layout>