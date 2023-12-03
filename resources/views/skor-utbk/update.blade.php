<div>
    <div class="pt-2 pb-4">
        <div class="py-2 px-4 border-b border-slate-200">
            <h2 class="text-xl font-bold">Tambah PTN</h2>
        </div>
        <div class="bg-white overflow-hidden sm:rounded-lg p-4">
            <form wire:submit.prevent='update' method="POST">
                <div>
                    <x-label for="program_studi" value="Program Studi" />
                    <x-input id="program_studi" wire:model="program_studi" class="block mt-1 w-full " type="text"
                        required />
                    @error('program_studi')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="ptn_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perguruan
                        Tinggi</label>
                    <select id="ptn_id"
                        class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        wire:model='ptn_id'>
                        <option>Pilih PTN</option>
                        @foreach ($campus->sortBy('nama_ptn') as $ptn)
                        <option value="{{ $ptn->id }}">{{ $ptn->nama_ptn . ' ('. $ptn->singkatan . ')' }}</option>
                        @endforeach
                    </select>
                    @error('ptn_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <x-label for="skor" value="Skor Rata-rata" />
                    <x-input id="skor" wire:model="skor" class="block mt-1 w-full " type="number" min="200" required />
                    @error('skor')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="hasil"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil</label>
                    <select id="hasil"
                        class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        wire:model='hasil'>
                        <option value="Lulus" selected>Lulus</option>
                        <option value="Tidak Lulus">Tidak Lulus</option>
                    </select>
                    @error('hasil')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="tahun"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                    <select id="tahun"
                        class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        wire:model='tahun'>
                        <option value="2023" selected>2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                    @error('tahun')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <x-button class="mt-4 text-right" type="submit">
                        Tambah
                    </x-button>
                    <button
                        class="items-center mt-4 px-4 py-2 bg-transparent underline border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 hover:text-white hover:no-underline active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        wire:click.prevent="$emit('closeModal')">
                        Batal
                    </button>

                </div>
            </form>
        </div>
    </div>

</div>