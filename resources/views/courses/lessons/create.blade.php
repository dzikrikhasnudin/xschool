<div>
    <div class="pt-2 pb-4">
        <div class="py-2 px-4 border-b border-slate-200">
            <h2 class="text-xl font-bold">Tambah Pelajaran</h2>
        </div>
        <div class="bg-white overflow-hidden sm:rounded-lg p-4">
            <form wire:submit.prevent='save' method="POST">
                <div>
                    <x-label for="name" value="Judul Pelajaran" />
                    <x-input id="name" wire:model="name" class="block mt-1 w-full " type="text" autofocus required />
                    @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="kelas"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <select id="kelas"
                        class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        wire:model='courseId'>
                        <option>Pilih Kelas</option>
                        @foreach ($courses->sortBy('name') as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label for="chapter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bab</label>
                    <select id="chapter"
                        class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        wire:model='chapter_id'>
                        <option>Pilih bab</option>
                        @forelse ($chapters->sortBy('name') as $chapter)
                        <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                        @empty
                        <option>Belum ada bab</option>
                        @endforelse
                    </select>
                    @error('chapter_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <x-label for="video" value="Video" />
                    <x-input id="video" wire:model="video" class="block mt-1 w-full " type="text" autofocus required />
                    @error('video')
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