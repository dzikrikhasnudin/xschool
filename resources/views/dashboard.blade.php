<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold my-auto text-lg md:text-xl text-gray-800 leading-tight mb-3">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-4 sm:px-6 lg:px-8 py-3">
            <div class="bg-white lg:flex  justify-around overflow-hidden shadow-xl rounded-lg px-4 ">
                <div class="p-4 my-auto text-center lg:text-left">
                    <h2 class="font-bold text-xl mb-2">Hallo, <span class="text-teal-500">{{ Auth::user()->name
                            }}.</span>
                    </h2>
                    <p class="lg:text-4xl text-3xl font-bold">
                        Sudah belajar <br> apa hari ini?
                    </p>
                </div>
                <div class="text-gray-800 p-4">
                    <img src="{{ asset('assets/img/countdown.png') }}" alt="" class="mx-auto lg:w-1/2">
                    <div class="text-6xl text-center flex w-full items-center justify-center">
                        <div class="w-24 mx-1 p-2 bg-white text-teal-800 rounded-lg border">
                            <div class="font-mono leading-none" x-text="days" id="days"></div>
                            <div class="font-mono uppercase text-sm leading-none ">Hari</div>
                        </div>
                        <div class="w-24 mx-1 p-2 bg-white text-teal-800 rounded-lg border">
                            <div class="font-mono leading-none" x-text="hours" id="hours"></div>
                            <div class="font-mono uppercase text-sm leading-none">Jam</div>
                        </div>
                        <div class="w-24 mx-1 p-2 bg-white text-teal-800 rounded-lg border">
                            <div class="font-mono leading-none" x-text="minutes" id="minutes"></div>
                            <div class="font-mono uppercase text-sm leading-none">Menit</div>
                        </div>
                        <div class="w-24 mx-1 p-2 bg-white text-teal-800 rounded-lg border">
                            <div class="font-mono leading-none" x-text="seconds" id="seconds"></div>
                            <div class="font-mono uppercase text-sm leading-none">Detik</div>
                        </div>
                    </div>
                    <h2 class="text-3xl text-center mt-3 font-semibold">Menuju UTBK-SNBT 2023</h2>
                </div>

            </div>

            {{-- Materi UTBK-SNBT 2023 --}}
            <div class="mt-4 bg-white overflow-hidden shadow-xl rounded-lg p-4">
                <h2 class="font-bold text-xl mb-4 mx-3">Materi <span class="text-teal-500">UTBK-SNBT 2023</span>
                    <div class=" overflow-x-auto shadow-md sm:rounded-lg mt-3">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Subtes
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah Soal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Waktu
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b">
                                    <td scope="col" class="px-6 py-3">
                                        Penalaran Umum
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        30 Soal
                                    </th>
                                    <td class="px-6 py-4">
                                        30 Menit
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <td scope="col" class="px-6 py-3">
                                        Pengetahuan dan Pemahaman Umum
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        20 Soal
                                    </th>
                                    <td class="px-6 py-4">
                                        15 Menit
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <td scope="col" class="px-6 py-3">
                                        Pemahaman Bacaan dan Menulis
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        20 Soal
                                    </th>
                                    <td class="px-6 py-4">
                                        25 Menit
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <td scope="col" class="px-6 py-3">
                                        Pengetahuan Kuantitatif
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        15 Soal
                                    </th>
                                    <td class="px-6 py-4">
                                        20 Menit
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <td scope="col" class="px-6 py-3">
                                        Literasi Bahasa Indonesia
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        30 Soal
                                    </th>
                                    <td class="px-6 py-4">
                                        45 Menit
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <td scope="col" class="px-6 py-3">
                                        Literasi Bahasa Inggris
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        20 Soal
                                    </th>
                                    <td class="px-6 py-4">
                                        30 Menit
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <td scope="col" class="px-6 py-3">
                                        Penalaran Matematika
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        20 Soal
                                    </th>
                                    <td class="px-6 py-4">
                                        30 Menit
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>

        @push('script')
        <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
        <script>
            (function () {
        const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = "05/14/",
        utbk = dayMonth + yyyy;

        today = mm + "/" + dd + "/" + yyyy;

        if (today > utbk) {
            utbk = dayMonth + nextYear;
        }
    //end

    const countDown = new Date(utbk).getTime(),
      x = setInterval(function() {

        const now = new Date().getTime(),
            distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          document.getElementById("headline").innerText = "It's my utbk!";
          document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
          clearInterval(x);
        }
        //seconds
      }, 0)
  }());
        </script>
        @endpush
</x-app-layout>