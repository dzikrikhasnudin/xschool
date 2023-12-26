<h2 class="font-bold text-2xl text-center text-teal-500">Nilai Tryout #{{ $batch }}</h2>
<hr class="my-3">
<div class="lg:grid lg:grid-cols-2 items-center">
    <div class="flex justify-between gap-3 lg:justify-normal lg:flex-col-reverse items-center">

        <div class="hidden lg:block ">
            <a href="#"
                class=" bg-amber-500 hover:bg-amber-400 transition-all duration-200 font-semibold text-white px-4 py-2 block mb-2 text-center rounded-lg"><i
                    class="fa-solid fa-ranking-star mr-2"></i> Leaderboard</a>
            <a href="{{ route('nilai-tryout.index') }}"
                class=" bg-gray-200 hover:bg-gray-300 transition-all duration-200 font-semibold  px-4 py-2 block text-center rounded-lg">Kembali</a>
        </div>

        <div class="lg:text-center">
            <h2 class="font-bold text-xl">{{ Auth::user()->name }}</h2>
            <p class="italic text-sm"> Kamu menjawab <span class="font-bold"> {{ $nilaiTryout->jumlah_benar
                    }}</span>
                soal
                dengan benar.
            </p>
        </div>

        <div class="flex flex-col gap-0 text-center px-3 py-2 rounded-xl bg-teal-500 text-white">
            <small class="text-xs">Rata-rata</small>
            <span class="font-bold text-2xl">{{ $nilaiTryout->rata_rata }}</span>
        </div>

    </div>
    <hr class="my-3 lg:hidden">
    <div>
        <div>
            <h3 class="font-bold mb-2">Tes Potensi Skolastik</h3>
            <div class="px-4">
                <div class="flex justify-between items-center mb-2">
                    <p>Kemampuan Penalaran Umum</p>
                    <span class="font-bold ">{{ $nilaiTryout->subtes_pu }}</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <p>Pengetahuan dan Pemahaman Umum</p>
                    <span class="font-bold">{{ $nilaiTryout->subtes_ppu }}</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <p>Pemahaman Bacaan dan Menulis</p>
                    <span class="font-bold">{{ $nilaiTryout->subtes_pbm }}</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <p>Pengetahuan Kuantitatif</p>
                    <span class="font-bold">{{ $nilaiTryout->subtes_pk }}</span>
                </div>
            </div>
        </div>
        <hr class="my-2">
        <div>
            <h3 class="font-bold mb-2">Tes Literasi</h3>
            <div class="px-4">
                <div class="flex justify-between items-center   mb-2">
                    <p>Literasi Bahasa Indonesia</p>
                    <span class="font-bold">{{ $nilaiTryout->subtes_litbindo }}</span>
                </div>
                <div class="flex justify-between items-center  mb-2">
                    <p>Literasi Bahasa Inggris</p>
                    <span class="font-bold">{{ $nilaiTryout->subtes_litbing }}</span>
                </div>
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-between   gap-4 mb-2">
            <h3 class="font-bold">Tes Penalaran Matematika</h3>
            <span class="px-4 lg:-ml-6 font-bold">{{ $nilaiTryout->subtes_pm }}</span>
        </div>
    </div>
</div>
<hr class="my-2">

<div class="flex flex-col gap-2 md:gap-4 mt-8 lg:hidden">
    <a href="#"
        class=" bg-amber-500 hover:bg-amber-400 transition-all duration-200 font-semibold text-white px-4 py-2 block text-center rounded-lg"><i
            class="fa-solid fa-ranking-star mr-2"></i> Leaderboard</a>
    <a href="{{ route('nilai-tryout.index') }}"
        class=" bg-gray-200 hover:bg-gray-300 transition-all duration-200 font-semibold  px-4 py-2 block text-center rounded-lg">Kembali</a>
</div>