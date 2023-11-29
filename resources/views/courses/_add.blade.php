<!-- Main modal -->
<div id="tambah-data" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-hide="tambah-data">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header -->
            <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                    Tambah Video
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-3">
                <ul class="my-4 space-y-3">
                    <li class="bg-gray-50 hover:bg-gray-100 group hover:shadow rounded-lg">
                        <div class="border-t py-3">
                            <form method="POST" class="px-3">
                                @csrf
                                @method('POST')
                                <div>
                                    <label for="judul_bab"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                        Bab</label>
                                    <select id="judul_bab" name="chapter_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option selected>Pilih Judul Bab</option>
                                        @foreach ($course->chapters as $chapter)
                                        <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="name"
                                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                        Video</label>
                                    <input type="text" name="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        placeholder="Masukkan judul video" required>
                                </div>
                                <div>
                                    <label for="video"
                                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Tautan
                                        Video</label>
                                    <input type="text" name="video"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        placeholder="Masukkan tautan video" required>
                                </div>
                                <x-button class="mt-2 ml-auto" type="submit">
                                    Tambah
                                </x-button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>