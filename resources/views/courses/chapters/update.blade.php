<div>
    <form wire:submit.prevent="update">
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
                <button type="submit" class="inline-flex items-center py-2.5 px-5 lg:px-3 mt-3 lg:mt-0 lg:ml-2 text-xs font-semibold text-white bg-gray-800 tracking-widest rounded-lg border border-gray-700 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
                   UPDATE
                </button>
            </div>
        </div>
    </form>
</div>
