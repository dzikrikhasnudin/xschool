<?php

use App\Models\User;
use App\Models\NilaiRapor;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getAverage')) {

    function getAverage($userId, $semester = null)
    {
        if ($semester != null) {
            $dataNilai = NilaiRapor::where('user_id', $userId)->where('semester', $semester)->get();
        } else {
            $dataNilai = NilaiRapor::where('user_id', $userId)->get();
        }

        $rataRata = 0;

        if ($dataNilai->count()) {
            $nilai = $dataNilai->pluck('nilai')->toArray();

            $totalNilai = array_sum(array_diff($nilai, [0]));
            $jumlahPelajaran = count(array_diff($nilai, [0]));
            $rataRata = $totalNilai / $jumlahPelajaran;
        }
        return number_format($rataRata, 2);
    }
}

if (!function_exists('studentName')) {

    function getStudent($userId)
    {
        $student = User::find($userId);

        return $student;
    }
}
