<?php

namespace App\Http\Livewire\NilaiTryout;

use App\Models\NilaiTryout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexTryout extends Component
{

    public function render()
    {
        if (Auth::user()->getRoleNames()->first() == "SuperAdmin") {
            $batch = NilaiTryout::select(['batch', 'tanggal_pelaksanaan'])->distinct()->get();
        } else {
            $batch = NilaiTryout::where('user_id', Auth::user()->id)->select(['batch', 'tanggal_pelaksanaan'])->distinct()->get();
        }

        return view('nilai-tryout.index', [
            'isAdmin' => true,
            'batch' => $batch
        ])->layout('layouts.app');
    }
}
