<div>
    <div class="py-6 mt-14">
        <div class="max-w-3xl sm:px-6 lg:px-4">
            <div class="bg-white p-4 mx-4 rounded-lg mb-3">
                <h2 class="font-bold text-2xl text-center text-teal-500">Leaderboard Try Out #3</h2>
                <hr class="my-3">

                @foreach ($averageScores->take(15) as $rank => $score)
                <div
                    class="flex items-center justify-between p-2 border gap-2 border-gray-200 rounded-lg shadow-sm mb-2">
                    <div class="flex gap-4 items-center">
                        <p class="bg-gray-200 rounded-full px-2 py-1 text-sm">{{ $rank + 1 }}</p>
                        <p class="font-semibold">{{ ucwords(strtolower($score->user->name)) }}</p>
                    </div>

                    <div class="bg-teal-100 text-teal-700 px-3 py-2 rounded-xl font-medium">
                        {{ $score->rata_rata }}
                    </div>
                </div>
                @endforeach
                @if (Auth::user()->getRoleNames()->first() == "Student")
                <hr class="my-3">
                <h3 class="font-bold text-lg text-teal-700 mt-4 mb-1">Peringkat Kamu</h3>
                <div
                    class="bg-teal-500 text-white flex items-center justify-between p-2 border gap-2 border-gray-200 rounded-lg shadow-sm mb-2">
                    <div class="flex gap-4 items-center">
                        <p class="bg-gray-100 rounded-full px-2 py-1 text-sm text-gray-700">{{ $userRank }}</p>
                        <p class="font-semibold">{{ ucwords(strtolower($userName)) }}</p>
                    </div>

                    <div class="bg-teal-50 text-teal-700 px-3 py-2 rounded-xl font-medium">
                        {{ $userScore }}
                    </div>
                </div>
                <hr class="my-3">

                <a href="{{ route('nilai-tryout.detail', ['batch' => $userBatch, 'username' => Auth::user()->username]) }}"
                    class=" bg-gray-200 hover:bg-gray-300 transition-all duration-200 font-semibold  px-4 py-2 text-center rounded-lg ml-auto block">Kembali</a>
                @endif

            </div>
        </div>
    </div>

</div>