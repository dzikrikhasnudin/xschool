<?php

namespace App\Http\Livewire\Utbk;

use App\Models\College;
use App\Models\SkorUtbk;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class CreateScore extends ModalComponent
{
    public $campus;

    public $program_studi;
    public $ptn_id;
    public $skor;
    public $hasil = 'Lulus';
    public $tahun = '2023';

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
    }

    public function render()
    {

        return view('skor-utbk.create');
    }

    public function save()
    {
        if (!Gate::allows('chapter_create')) {
            abort(403);
        }

        $this->validate();
        $score = SkorUtbk::create([
            'program_studi' => $this->program_studi,
            'ptn_id' => $this->ptn_id,
            'skor' => $this->skor,
            'hasil' => $this->hasil,
            'tahun' => $this->tahun
        ]);

        $this->emit('scoreStored', $score);

        $this->emit('closeModal');
    }
}
