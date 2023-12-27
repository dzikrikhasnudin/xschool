<?php

namespace App\Http\Livewire\NilaiTryout;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\NilaiTryout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EditTryout extends Component
{
    public $users;
    public $data;

    public $user_id;
    public $batch;
    public $tanggal_pelaksanaan;
    public $subtes_pu;
    public $subtes_ppu;
    public $subtes_pbm;
    public $subtes_pk;
    public $subtes_litbindo;
    public $subtes_litbing;
    public $subtes_pm;
    public $jumlah_benar;
    public $rata_rata;

    protected $listeners = ['dateSelected' => 'updateDate'];

    public function mount($id)
    {
        if (!Gate::allows('chapter_update')) {
            abort(403);
        }

        $this->users = User::where('group_class', 2)->orderBy('name', 'ASC')->get();
        $this->data = NilaiTryout::find($id);

        $this->user_id = $this->data->user_id;
        $this->batch = $this->data->batch;
        $this->tanggal_pelaksanaan = $this->data->tanggal_pelaksanaan;
        $this->subtes_pu = $this->data->subtes_pu;
        $this->subtes_ppu = $this->data->subtes_ppu;
        $this->subtes_pbm = $this->data->subtes_pbm;
        $this->subtes_pk = $this->data->subtes_pk;
        $this->subtes_litbindo = $this->data->subtes_litbindo;
        $this->subtes_litbing = $this->data->subtes_litbing;
        $this->subtes_pm = $this->data->subtes_pm;
        $this->jumlah_benar = $this->data->jumlah_benar;
        $this->rata_rata = $this->data->rata_rata;
    }

    public function render()
    {
        return view('nilai-tryout.edit')->layout('layouts.app');
    }

    public function update()
    {

        // $this->validate();
        $this->data->update([
            'user_id' => $this->user_id,
            'batch' => $this->batch,
            'subtes_pu' => $this->subtes_pu,
            'subtes_ppu' => $this->subtes_ppu,
            'subtes_pbm' => $this->subtes_pbm,
            'subtes_pk' => $this->subtes_pk,
            'subtes_litbindo' => $this->subtes_litbindo,
            'subtes_litbing' => $this->subtes_litbing,
            'subtes_pm' => $this->subtes_pm,
            'rata_rata' => $this->average(),
            'jumlah_benar' => $this->jumlah_benar,
            'tanggal_pelaksanaan' => $this->tanggal_pelaksanaan
        ]);

        return redirect()->route(
            'nilai-tryout.detail',
            [
                'batch' => $this->batch,
                'username' => Auth::user()->username
            ]
        );
    }

    public function updateDate($date)
    {
        $tanggal = Carbon::parse($date);
        $this->tanggal_pelaksanaan = $tanggal->timezone('Asia/Jakarta')->format('Y-m-d');
    }

    private function average()
    {
        $nilai = array($this->subtes_pu, $this->subtes_ppu, $this->subtes_pbm, $this->subtes_pk, $this->subtes_litbindo, $this->subtes_litbing, $this->subtes_pm);
        $average = array_sum($nilai) / 7;

        return $average;
    }
}
