<?php

namespace App\Http\Livewire\Utbk;

use App\Models\College;
use App\Models\SkorUtbk;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class UpdateScore extends ModalComponent
{
    public $campus;
    public $scoreId;
    public $score;

    public $program_studi;
    public $ptn_id;
    public $skor;
    public $hasil;
    public $tahun;

    protected $rules = [
        'program_studi' => 'required|min:4|string',
        'ptn_id' => 'required',
        'skor' => 'required|numeric',
    ];

    protected $messages = [
        'min' => ':attribute harus terdiri dari minimal :min karakter.',
        'required' => ':attribute harus diisi.',
        'string' => ':attribute harus berupa string.',
        'numeric' => ':attribute harus berupa angka.',
    ];

    protected $validationAttributes = [
        'program_studi' => 'Program Studi',
        'ptn_id' => 'Perguruan Tinggi',
        'skor' => 'Skor Rata-rata ',
    ];

    public function mount()
    {
        $this->campus = College::all()->sortBy('name');
        $this->score = SkorUtbk::find($this->scoreId);

        $this->program_studi = $this->score->program_studi;
        $this->ptn_id = $this->score->ptn_id;
        $this->skor = $this->score->skor;
        $this->hasil = $this->score->hasil;
        $this->tahun = $this->score->tahun;
    }

    public function render()
    {
        return view('skor-utbk.update');
    }

    public function update()
    {
        if (!Gate::allows('chapter_update')) {
            abort(403);
        }

        $this->validate();
        $this->score->update([
            'program_studi' => $this->program_studi,
            'ptn_id' => $this->ptn_id,
            'skor' => $this->skor,
            'hasil' => $this->hasil,
            'tahun' => $this->tahun
        ]);

        $this->emit('scoreUpdated', $this->score);

        $this->emit('closeModal');
    }
}
