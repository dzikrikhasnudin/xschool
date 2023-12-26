<div>

    <x-slot name="title">Nilai Tryout</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight text-center mb-3">
                Nilai Tryout
            </h2>

            @can('user_show')
            <a href="{{ route('nilai-tryout.create') }}"
                class="bg-teal-600 px-4 py-2 text-white rounded-full hover:bg-teal-700 text-center inline-block"> <i
                    class="fas fa-plus"></i>
                Tambah</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white p-4 mx-4 rounded-lg mb-3">
                @forelse ($batch as $data)
                <div class="flex justify-between items-center py-2">
                    <div class="text font-semibold">
                        <h3>Tryout UTBK-SNBT #{{ $data->batch }}</h3>
                        @inject('carbon', 'Carbon\Carbon')
                        <p class="font-light text-sm"> {{
                            $carbon::parse($data->tanggal_pelaksanaan)->isoFormat('D MMMM Y') }}
                        </p>
                    </div>
                    <a href="{{ route('nilai-tryout.detail', ['batch' => $data->batch, 'username' => Auth::user()->username]) }}"
                        class=" text-white bg-teal-400 px-4 py-2 rounded-lg hover:bg-teal-500 transition-all duration-200">Lihat
                        Hasil</a>
                </div>
                <hr class="my-2">
                @empty
                @if (Auth::user()->getRoleNames()->first() == "Student")
                <h2>Kamu belum pernah ikut Try Out UTBK-SNBT! </h2>
                @else
                <h2>Belum ada data.</h2>
                @endif
                @endforelse

            </div>
        </div>
    </div>
</div>