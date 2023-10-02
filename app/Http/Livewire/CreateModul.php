<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Modul;
use App\Models\Courses\Course;
use Illuminate\Support\Facades\Gate;

class CreateModul extends Component
{
    public $name;
    public $chapter_id;
    public $file;

    protected $messages = [
        'name.required' => 'Nama Modul harus diisi.',
        'file.required' => 'Tautan file harus diisi.',
        'chapter_id.required' => 'Bab harus dipilih salah satu'
    ];

    public function render()
    {
        return view('courses.moduls.create', [
            'courses' => Course::all()
        ]);
    }

    public function store()
    {
        if (!Gate::allows('chapter_create')) {
            abort(403);
        }

        $this->validate([
            'name' => 'required|min:5|string',
            'file' => 'required|string',
            'chapter_id' => 'required'
        ]);

        $modul = Modul::create([
            'name' => $this->name,
            'file' => $this->file,
            'chapter_id' => $this->chapter_id,
        ]);

        $this->resetInput();

        $this->emit('modulStored', $modul);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->file = null;
        $this->chapter_id = null;
    }
}
