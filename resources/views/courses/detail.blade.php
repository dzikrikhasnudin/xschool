<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penalaran Umum') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <di class="max-w-6xl mx-auto mt-20 lg:grid lg:grid-cols-3 gap-4">
                    <div class="">
                        <a href="{{ route('kelas.watch') }}" class="aspect-video mb-3">
                            <img src="{{ asset('assets/img/kesesuaian-pernyataan.jpg') }}" alt=""
                                class="w-full object-cover">
                        </a>
                        <div class="mx-2 p-2">
                            <a href="{{ route('kelas.watch') }}">
                                <h2 class="text-md font-semibold leading-normal line-clamp-2">Kesesuaian Pernyataan</h2>
                            </a>
                            <p class="my-1 text-sm">Dipublikasikan pada 01 January 2023</p>
                        </div>
                    </div>
                    <div class="">
                        <a href="#" class="aspect-video mb-3">
                            <img src="{{ asset('assets/img/simpulan-logis.jpg') }}" alt=""
                                class="w-full object-cover">
                        </a>
                        <div class="mx-2 p-2">
                            <a href="#">
                                <h2 class="text-md font-semibold leading-normal line-clamp-2">Simpulan Logis</h2>
                            </a>
                            <p class="my-2 text-sm">Dipublikasikan pada 05 November 2022</p>
                        </div>
                    </div>
                    <div class="">
                        <a href="#" class="aspect-video mb-3">
                            <img src="{{ asset('assets/img/penalaran-analitik.jpg') }}" alt=""
                                class="w-full object-cover">
                        </a>
                        <div class="mx-2 p-2">
                            <a href="#">
                                <h2 class="text-md font-semibold leading-normal line-clamp-2">Penalaran Analitik</h2>
                            </a>
                            <p class="my-2 text-sm">Dipublikasikan pada 05 November 2022</p>
                        </div>
                    </div>
                    <div class="">
                        <a href="#" class="aspect-video mb-3">
                            <img src="{{ asset('assets/img/penalaran-kuantitatif.jpg') }}" alt=""
                                class="w-full object-cover">
                        </a>
                        <div class="mx-2 p-2">
                            <a href="#">
                                <h2 class="text-md font-semibold leading-normal line-clamp-2">Penalaran Kuantitatif</h2>
                            </a>
                            <p class="my-2 text-sm">Dipublikasikan pada 05 November 2022</p>
                        </div>
                    </div>
                    <div class="">
                        <a href="#" class="aspect-video mb-3">
                            <img src="{{ asset('assets/img/kriptografi.jpg') }}" alt=""
                                class="w-full object-cover">
                        </a>
                        <div class="mx-2 p-2">
                            <a href="#">
                                <h2 class="text-md font-semibold leading-normal line-clamp-2">Bahasa Panda dan
                                    Kriptografi</h2>
                            </a>
                            <p class="my-2 text-sm">Dipublikasikan pada 05 November 2022</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
