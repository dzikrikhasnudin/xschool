<div>
    <form wire:submit.prevent="store">
        <h2 class="font-semibold my-auto text-md md:text-xl text-gray-800 leading-tight mb-3">
            Tambah Data
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 mb-3">
            <div>
                <input type="text" wire:model.lazy="name"
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan judul pelajaran" required>
            </div>
            <select wire:model.lazy="chapter_id" id="chapter_id"
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
            <div>
                <input wire:model.lazy="video" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan tautan video" required>
            </div>
        </div>
        <div class="flex justify-end">
            <x-button class="">Submit</x-button>
        </div>
    </form>
</div>
