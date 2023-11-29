<x-app-layout>
    <x-slot name="title">Nilai Rapor</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Form Edit Nilai Rapor - Semester {{ $semester }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white p-4 mx-4 rounded-lg mb-3">

                <form class="md:p-6" action="{{ route('nilai-rapor.update', request()->semester) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4 md:flex md:items-center">
                        <label for="semester" class="w-1/3 mb-3 text-gray-900 font-semibold">Semester</label>
                        <select id="semester" name="semester" required disabled
                            class=" w-full bg-gray-50 border border-gray-300   text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                            <option value="" selected>Pilih Semester</option>
                            <option value="1" {{ $semester=="1" ? 'selected' : '' }}>Semester 1</option>
                            <option value="2" {{ $semester=="2" ? 'selected' : '' }}>Semester 2</option>
                            <option value="3" {{ $semester=="3" ? 'selected' : '' }}>Semester 3</option>
                            <option value="4" {{ $semester=="4" ? 'selected' : '' }}>Semester 4</option>
                            <option value="5" {{ $semester=="5" ? 'selected' : '' }}>Semester 5</option>
                            <option value="6" {{ $semester=="6" ? 'selected' : '' }}>Semester 6</option>
                        </select>
                    </div>
                    <hr class="my-2">
                    <h2 class="text-xl font-bold my-3">Mata Pelajaran</h2>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    @forelse ($nilai as $data)
                    <div class="mb-3 md:flex">
                        <label for="{{ strtolower($data->pelajaran->nama) }}"
                            class="w-full block mb-2  font-medium text-gray-900 ">{{ $data->pelajaran->nama
                            }}</label>
                        <input type="number" id="{{ strtolower($data->pelajaran->nama) }}" max="100" min="0"
                            value="{{ $data->nilai }}" name="{{ $data->id }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    @empty
                    <div class="mb-3 md:flex">
                        <h3 class="p-2 text-lg">Anda belum melakukan input nilai rapor semester {{ $semester }}</h3>
                    </div>
                    @endforelse

                    <small class="italic flex text-left md:text-right">Catatan: Isi dengan nilai 0 apabila tidak ada
                        nilai dengan
                        mata pelajaran tersebut.</small>
                    <!-- Tombol Submit -->
                    <div class="mt-6 flex gap-2">
                        <button type="submit"
                            class="bg-teal-500 text-white px-4 py-2 rounded-lg transition duration-300 hover:bg-teal-600 focus:outline-none focus:bg-teal-600">Update
                            Nilai</button>
                        <a href="{{ route('nilai-rapor.index') }}"
                            class="bg-gray-200 text-gray-500 px-4 py-2 rounded-lg transition duration-300  hover:bg-gray-600 hover:text-white focus:outline-none focus:bg-gray-600">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>