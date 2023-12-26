<div>
    <x-slot name="title">Tambah Nilai Tryout</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Form Input Nilai Tryout
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white p-4 mx-4 rounded-lg mb-3">

                <form class="md:p-6" wire:submit.prevent='save' method="POST">
                    <div class="mb-4 md:flex items-center md:items-center">
                        <label for="user_id" class="w-1/3 mb-3 text-gray-900 font-semibold">Nama Siswa</label>
                        <select id="user_id" wire:model="user_id" required
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-cyan-500 focus:border-cyan-500 p-2.5">
                            <option value="" selected>Pilih Siswa</option>
                            @foreach ($users as $index => $user)
                            <option value="{{ $user->id }}">{{
                                ucwords(strtolower($user->name)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 md:flex items-center md:items-center">
                        <label for="batch" class="w-1/3 mb-3 text-gray-900 font-semibold">Batch Tryout</label>
                        <select id="batch" wire:model='batch' required
                            class=" w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-cyan-500 focus:border-cyan-500 p-2.5">
                            <option value="" selected>Pilih Tryout</option>
                            <option value="1">Tryout #1</option>
                            <option value="2">Tryout #2</option>
                            <option value="3">Tryout #3</option>
                            <option value="4">Tryout #4</option>
                            <option value="5">Tryout #5</option>
                            <option value="6">Tryout #6</option>
                            <option value="7">Tryout #6</option>
                        </select>
                    </div>

                    <div class="mb-3 md:flex items-center">
                        <label for="tanggal" class="w-1/3 mb-3 text-gray-900 font-semibold">Tanggal Pelaksanaan</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                                wire:model='tanggal_pelaksanaan' type="text" id="tanggal"
                                class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full pl-10 p-2.5"
                                placeholder="Pilih Tanggal" required>
                        </div>
                    </div>

                    <hr class="my-2">
                    <h2 class="text-xl font-bold my-3">Tes Potensi Skolastik</h2>
                    <div class="mb-3 md:flex items-center">
                        <label for="subtes_pu" class="w-full block mb-2  font-medium text-gray-900 ">Kemampuan Penalaran
                            Umum</label>
                        <input type="number" wire:model='subtes_pu' id="subtes_pu" max="1000" min="100"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-3 md:flex items-center">
                        <label for="subtes_ppu" class="w-full block mb-2  font-medium text-gray-900 ">Pengetahuan dan
                            Pemahaman Umum</label>
                        <input type="number" wire:model='subtes_ppu' id="subtes_ppu" max="1000" min="100"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-3 md:flex items-center">
                        <label for="subtes_pbm" class="w-full block mb-2  font-medium text-gray-900 ">Pemahaman Bacaan
                            dan Menulis</label>
                        <input type="number" wire:model='subtes_pbm' id="subtes_pbm" max="1000" min="100"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-3 md:flex items-center">
                        <label for="subtes_pk" class="w-full block mb-2  font-medium text-gray-900 ">Pengetahuan
                            Kuantitatif</label>
                        <input type="number" wire:model='subtes_pk' id="subtes_pk" max="1000" min="100"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                            required>
                    </div>
                    <hr class="my-2">
                    <h2 class="text-xl font-bold my-3">Tes Literasi</h2>
                    <div class="mb-3 md:flex items-center">
                        <label for="subtes_litbindo" class="w-full block mb-2  font-medium text-gray-900 ">Literasi
                            Bahasa
                            Indonesia</label>
                        <input type="number" wire:model='subtes_litbindo' id="subtes_litbindo" max="1000" min="100"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="mb-3 md:flex items-center">
                        <label for="subtes_litbing" class="w-full block mb-2  font-medium text-gray-900 ">Literasi
                            Bahasa
                            Inggris</label>
                        <input type="number" wire:model='subtes_litbing' id="subtes_litbing" max="1000" min="100"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                            required>
                    </div>

                    <hr class="my-2">
                    <div class="mb-3 md:flex items-center ">
                        <label for="subtes_pm" class="w-full block mb-2  font-bold text-xl text-gray-900 ">Tes Penalaran
                            Matematika</label>
                        <input type="number" wire:model='subtes_pm' id="subtes_pm" max="1000" min="100"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                            required>
                    </div>
                    <hr class="my-2">
                    <div class="mb-3 md:flex items-center ">
                        <label for="jumlah_benar" class="w-full block mb-2  font-bold text-xl text-gray-900 ">Jumlah
                            Benar</label>
                        <input type="number" wire:model='jumlah_benar' id="jumlah_benar" max="155" min="0"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                            required>
                    </div>
                    <!-- Tombol Submit -->
                    <div class="mt-6 flex gap-2">
                        <button type="submit"
                            class="bg-teal-500 text-white px-4 py-2 rounded-lg transition duration-300 hover:bg-teal-600 focus:outline-none focus:bg-teal-600">Simpan
                            Nilai</button>
                        <a href="{{ route('nilai-tryout.index') }}"
                            class="bg-gray-200 text-gray-500 px-4 py-2 rounded-lg transition duration-300  hover:bg-gray-600 hover:text-white focus:outline-none focus:bg-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
    <script>
        const datepickerEl = document.getElementById('tanggal');

        datepickerEl.addEventListener('changeDate', (event) => {
            console.log(event.detail.date);
            window.livewire.emit('dateSelected', event.detail.date);
        });
    </script>
    @endpush
</div>