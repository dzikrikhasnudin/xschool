<div>
    <div class="pt-2 pb-4">
        <div class="py-2 px-4 border-b border-slate-200">
            <h2 class="text-xl font-bold">Edit Bab </h2>
        </div>
        <div class="bg-white overflow-hidden sm:rounded-lg p-4">
            <form wire:submit.prevent='update' method="POST">
                <div>
                    <x-label for="name" value="Judul Bab" />
                    <x-input id="name" wire:model="name" class="block mt-1 w-full " type="text" required />
                    @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <select id="status"
                        class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        wire:model='course_id'>
                        <option>Pilih Kelas</option>
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <x-button class="mt-4 text-right" type="submit">
                        Ubah
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

    {{-- <form wire:submit.prevent="update">
        <h2 class="font-semibold my-auto text-md md:text-xl text-gray-800 leading-tight mb-3">
            Edit Data
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 mb-3">
            <input type="hidden" name="" wire:model="chapterId">
            <div>
                <input type="text" wire:model="name"
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan judul bab" required>
            </div>

            <div class="flex flex-col lg:flex-row items-center">
                <select wire:model="course_id" id="course_id"
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Pilih Kelas</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-5 lg:px-3 mt-3 lg:mt-0 lg:ml-2 text-xs font-semibold text-white bg-gray-800 tracking-widest rounded-lg border border-gray-700 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
                    UPDATE
                </button>
            </div>
        </div>
    </form> --}}
</div>