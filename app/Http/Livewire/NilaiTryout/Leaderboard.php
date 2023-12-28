<?php

namespace App\Http\Livewire\NilaiTryout;

use Livewire\Component;
use App\Models\NilaiTryout;
use Illuminate\Support\Facades\Auth;

class Leaderboard extends Component
{
    public $batch;
    public $userRank;
    public $userScore;
    public $userName;
    public $userBatch;


    public function mount($batch)
    {
        $this->batch = NilaiTryout::where('batch', $batch)->exists();

        if (!$this->batch) {
            abort(404);
        };
    }

    public function render()
    {

        $averageScores = NilaiTryout::select(['user_id', 'batch', 'rata_rata'])->orderBy('rata_rata', 'DESC')->get();

        foreach ($averageScores as $rank => $data) {
            if ($data->user_id == Auth::user()->id) {
                $this->userRank = $rank + 1;
                $this->userScore = $data->rata_rata;
                $this->userName = $data->user->name;
                $this->userBatch = $data->batch;
            }
        }


        return view('nilai-tryout.leaderboard', compact('averageScores'))->layout('layouts.app');
    }
}
