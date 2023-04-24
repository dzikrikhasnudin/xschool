<div class="pt-2 pb-4" x-show="open" x-collapse>
    <div class="py-2 px-4 border-b border-t mt-3 border-slate-200">
        <h2 class="text-xl font-bold">Edit Kelas</h2>
    </div>
    <div class="bg-white overflow-hidden sm:rounded-lg p-4">
        <form action="{{ route('kelas.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <x-label for="name" value="{{ __('Judul Kelas') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                    value="{{ $course->name }}" autofocus required />
            </div>
            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="thumbnail">Thumbnail</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="thumbnail" name="thumbnail" type="file" accept="" onchange="showPreview(event);">
                <input type="hidden" name="old_image" value="{{ $course->thumbnail }}">
                <img id="preview" src="{{ asset('storage/' . $course->thumbnail) }}" alt=""
                    class="w-1/2 object-cover mx-auto p-4">
            </div>
            <div class="mt-4">
                <label for="status"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <select id="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="status">
                    <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $course->status == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>


            <div class="flex gap-2">
                <x-button class="mt-4 text-right" type="submit">
                    Ubah
                </x-button>
                <button @click.prevent="open = ! open"
                    class="items-center mt-4 px-4 py-2 bg-transparent underline border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 hover:text-white hover:no-underline active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Batal
                </button>

            </div>
        </form>
    </div>

    @push('script')
        <script>
            function showPreview(event) {
                preview = document.getElementById("preview");

                // preview.remove();

                preview.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    @endpush
</div>
