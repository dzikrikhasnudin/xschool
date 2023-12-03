<?php

namespace App\Http\Livewire\College;

use App\Models\College;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class UpdateCollege extends ModalComponent
{
    public $college;
    public $nama_ptn;
    public $singkatan;

    protected $rules = [
        'nama_ptn' => 'required|min:5|string',
        'singkatan' => 'required|unique:colleges,singkatan'
    ];

    protected $messages = [
        'min' => ':attribute harus terdiri dari minimal :min karakter.',
        'required' => ':attribute harus diisi.',
        'string' => ':attribute harus berupa string.',
        'unique' => 'Nama PTN tersebut sudah ada.'
    ];

    protected $validationAttributes = [
        'nama_ptn' => 'Nama PTN',
        'singkatan' => 'Singkatan'
    ];

    public function mount($college)
    {
        $this->college = College::find($college);

        $this->nama_ptn = $this->college->nama_ptn;
        $this->singkatan = $this->college->singkatan;
    }
    public function render()
    {
        return view('kampus.update');
    }

    public function update()
    {
        if (!Gate::allows('chapter_update')) {
            abort(403);
        }

        $this->college->update([
            'nama_ptn' => $this->nama_ptn,
            'singkatan' => $this->singkatan,
        ]);

        $this->emit('collegeUpdated', $this->college);
        $this->emit('closeModal');
    }
}
