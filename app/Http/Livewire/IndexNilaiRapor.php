<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\NilaiRapor;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IndexNilaiRapor extends Component
{
    use WithPagination;

    public $semester = 1;
    public $updateUserRole = false;
    public $name;
    public $nilaiId;
    public $search;
    public $siswa;

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        $user = Auth::user();
        if ($this->siswa != null) {
            $dataNilai = NilaiRapor::where('user_id', $this->siswa->id)->where('semester', $this->semester)->orderBy('pelajaran_id', 'asc')->get();
        } else {
            $dataNilai = NilaiRapor::where('user_id', $user->id)->where('semester', $this->semester)->orderBy('pelajaran_id', 'asc')->get();
            $this->siswa = $user;
        }

        return view('nilai-rapor.nilai', [
            'nilai' => $dataNilai,
            'siswa' => $this->siswa
        ]);
    }

    public function destroy($semester)
    {

        $user = Auth::user();
        $nilai = NilaiRapor::where('user_id', $user->id)->where('semester', $semester)->get();

        foreach ($nilai as $data) {
            $data->delete();
        }
    }
}
