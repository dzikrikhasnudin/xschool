<?php

namespace App\Http\Livewire;

use App\Models\NilaiRapor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class IndexNilaiRapor extends Component
{
    use WithPagination;

    public $semester = 1;
    public $updateUserRole = false;
    public $name;
    public $role_id;
    public $userId;
    public $search;

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        $user = Auth::user();
        $nilai = NilaiRapor::where('user_id', $user->id)->where('semester', $this->semester)->orderBy('pelajaran_id', 'asc')->get();

        return view('nilai-rapor.nilai', [
            'nilai' => $nilai
        ]);
    }
}
