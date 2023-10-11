<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

use App\Models\NilaiRapor;

class RaporSiswa extends Component
{
    public function render()
    {
        $raporSiswa = NilaiRapor::all()->pluck('user_id')->toArray();

        return view('nilai-rapor.rapor-siswa', [
            'users' => array_unique($raporSiswa)
        ]);
    }
}
