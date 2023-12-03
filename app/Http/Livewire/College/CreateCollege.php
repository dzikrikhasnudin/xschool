<?php

namespace App\Http\Livewire\College;

use App\Models\College;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class CreateCollege extends ModalComponent
{
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
    public function render()
    {
        return view('kampus.create');
    }

    public function save()
    {
        if (!Gate::allows('chapter_create')) {
            abort(403);
        }

        $college = $this->validate();
        College::create($college);

        $this->emit('collegeStored', $college);

        $this->emit('closeModal');
    }
}
