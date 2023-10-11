<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Course;
use App\Models\Courses\Modul;
use Illuminate\Support\Facades\Gate;

class UpdateModul extends Component
{
    public $courses;
    public $name;
    public $chapter_id;
    public $file;
    public $modulId;
    public $updateModul = false;
    public $search;

    protected $listeners = [
        'getModul' => 'showModul'
    ];

    public function render()
    {
        return view('courses.moduls.update');
    }

    public function showModul($modul)
    {
        $this->name = $modul['name'];
        $this->file = $modul['file'];
        $this->chapter_id = $modul['chapter_id'];
        $this->modulId = $modul['id'];
    }

    public function update()
    {
        if (!Gate::allows('chapter_update')) {
            abort(403);
        }

        if ($this->modulId) {
            $modul = Modul::find($this->modulId);
            $modul->update([
                'name' => $this->name,
                'file' => $this->file,
                'chapter_id' => $this->chapter_id,
            ]);

            $this->resetInput();

            $this->emit('modulUpdated', $modul);
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->file = null;
        $this->chapter_id = null;
    }
}
