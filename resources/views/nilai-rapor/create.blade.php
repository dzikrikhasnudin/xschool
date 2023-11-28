<x-app-layout>
    <x-slot name="title">Nilai Rapor</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Form Input Nilai Rapor
            </h2>

        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white p-4 mx-4 rounded-lg mb-3">

                <form class="md:p-6" action="{{ route('nilai-rapor.store') }}" method="POST">
                    @csrf
                    @if (Auth::user()->getRoleNames()->first() != "Student")
                    <div class="mb-4 md:flex md:items-center">
                        <label for="user_id" class="w-1/3 mb-3 text-gray-900 font-semibold">Nama Siswa</label>
                        <select id="user_id" name="user_id" required
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                            <option value="" selected>Pilih Siswa</option>
                            @foreach ($users as $index => $user)
                            <option value="{{ $user->id }}" {{ old('user_id')==$user->id ? 'selected' : '' }}>{{
                                ucwords(strtolower($user->name)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif

                    <div class="mb-4 md:flex md:items-center">
                        <label for="semester" class="w-1/3 mb-3 text-gray-900 font-semibold">Semester</label>
                        <select id="semester" name="semester" required
                            class=" w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                            <option value="" selected>Pilih Semester</option>
                            <option value="1" {{ old('semester')==1 ? 'selected' : '' }}>Semester 1</option>
                            <option value="2" {{ old('semester')==2 ? 'selected' : '' }}>Semester 2</option>
                            <option value="3" {{ old('semester')==3 ? 'selected' : '' }}>Semester 3</option>
                            <option value="4" {{ old('semester')==4 ? 'selected' : '' }}>Semester 4</option>
                            <option value="5" {{ old('semester')==5 ? 'selected' : '' }}>Semester 5</option>
                            <option value="6" {{ old('semester')==6 ? 'selected' : '' }}>Semester 6</option>
                        </select>
                    </div>

                    <hr class="my-2">
                    <h2 class="text-xl font-bold my-3">Mata Pelajaran</h2>

                    @foreach ($mataPelajaran as $pelajaran)
                    <div class="mb-3 md:flex">
                        <label for="{{ strtolower($pelajaran->nama) }}"
                            class="w-full block mb-2  font-medium text-gray-900 ">{{ $pelajaran->nama
                            }}</label>
                        <input type="number" id="{{ strtolower($pelajaran->nama) }}" max="100" min="0"
                            name="{{ $pelajaran->id }}" value="{{ old($pelajaran->id) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    @endforeach

                    <small class="italic flex text-left md:text-right">Catatan: Isi dengan nilai 0 apabila tidak
                        ada
                        nilai dengan mata pelajaran tersebut.</small>
                    <!-- Tombol Submit -->
                    <div class="mt-6 flex gap-2">
                        <button type="submit"
                            class="bg-teal-500 text-white px-4 py-2 rounded-lg transition duration-300 hover:bg-teal-600 focus:outline-none focus:bg-teal-600">Simpan
                            Nilai</button>
                        <a href="{{ route('nilai-rapor.index') }}"
                            class="bg-gray-200 text-gray-500 px-4 py-2 rounded-lg transition duration-300  hover:bg-gray-600 hover:text-white focus:outline-none focus:bg-gray-600">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>