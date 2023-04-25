<div>
    <form wire:submit.prevent="store">
        <h2 class="font-semibold my-auto text-md md:text-xl text-gray-800 leading-tight mb-3">
            Tambah Data
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 mb-3">
            <div>
                <input type="text" wire:model="name"
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan judul pelajaran" required>
            </div>
            <select wire:model="chapter_id" id="chapter_id"
                class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <option selected>Pilih Bab</option>
                @foreach ($courses as $course)
                    @if ($course->chapters->count())
                        <optgroup label="{{ $course->name }}">
                            @foreach ($course->chapters as $chapter)
                                <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                            @endforeach
                        </optgroup>
                    @endif
                @endforeach
            </select>
            <div class="flex flex-col lg:flex-row items-center">
                <div class="relative w-full">
                    <input type="text" wire:model="video" id="video" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan tautan video" required>
                </div>
                <button type="submit" class="inline-flex items-center py-2.5 px-5 lg:px-3 mt-3 lg:mt-0 lg:ml-2 text-xs font-semibold text-white bg-gray-800 tracking-widest rounded-lg border border-gray-700 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
                   SUBMIT
                </button>
            </div>
        </div>
    </form>
</div>
