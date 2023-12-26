<?php

namespace App\Http\Livewire\NilaiTryout;

use App\Models\NilaiTryout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DetailTryout extends Component
{
    public $isAdmin = false;
    public $user;
    public $batch;
    public $username;
    public $nilaiTryout;


    public function mount()
    {
        $this->user = Auth::user();

        $this->nilaiTryout = NilaiTryout::where('batch', $this->batch)->where('user_id', $this->user->id)->first();

        if ($this->user->getRoleNames()->first() == 'SuperAdmin') {
            $this->isAdmin = true;
        }

        if ($this->username != $this->user->username) {
            abort(404);
        }
    }
    public function render()
    {
        return view('nilai-tryout.detail');
    }
}
