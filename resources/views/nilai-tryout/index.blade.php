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
                <div class="countdown"></div>
                <hr class="my-2">
                @forelse ($batch as $data)
                <div class="flex justify-between items-center py-2">

                    <div class="text font-semibold">
                        <h3>Tryout UTBK-SNBT #{{ $data->batch }}</h3>
                        @inject('carbon', 'Carbon\Carbon')
                        <p class="font-light text-sm"> {{
                            $carbon::parse($data->tanggal_pelaksanaan)->isoFormat('D MMMM Y') }}
                        </p>
                    </div>
                    @if (Auth::user()->getRoleNames()->first() == 'SuperAdmin')
                    <a href="{{ route('nilai-tryout.detail', ['batch' => $data->batch, 'username' => Auth::user()->username]) }}"
                        class=" text-white bg-teal-400 px-4 py-2 rounded-lg hover:bg-teal-500 transition-all duration-200"
                        disabled>Lihat
                        Hasil</a>
                    @else
                    <button disabled type="button"
                        class="text-white bg-teal-400 hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2  inline-flex items-center">
                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-2 text-white animate-spin"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        Loading...
                    </button>
                    @endif


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

@push('style')
<style>
    .btn-lihat-hasil {
        pointer-events: none;
    }

    .countdown {
        display: flex;
        justify-content: center;
        font-size: 20px;
    }

    .countdown>.simply-section {
        padding: 8px;
    }

    .countdown .simply-amount {
        font-weight: bold;
    }

    .countdown .simply-word {
        margin-left: 4px;
        font-size: 14px;
    }

    .countdown>.simply-days-section {
        display: none
    }
</style>
@endpush

@push('script')
<link rel="stylesheet" href="{{ asset('js/simplyCountdown/simplyCountdown.theme.default.css') }}" />
<script src="{{ asset('js/simplyCountdown/simplyCountdown.min.js') }}"></script>

<script>
    simplyCountdown('.countdown', {
        year: 2023, // required
        month: 12, // required
        day: 28, // required
        hours: 15, // Default is 0 [0-23] integer
        words: { //words displayed into the countdown
            days: { singular: 'hari', plural: 'hari' },
            hours: { singular: 'jam', plural: 'jam' },
            minutes: { singular: 'menit', plural: 'menit' },
            seconds: { singular: 'detik', plural: 'detik' }
        },

    })
</script>


@endpush