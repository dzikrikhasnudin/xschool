<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Chapter;
use Illuminate\Support\Facades\Gate;

class TambahChapter extends Component
{
    public $courses;
    public $chapters;
    public $name;
    public $course_id;


    public function render()
    {
        return view('courses.chapters.create');
    }

    public function store()
    {
        if (!Gate::allows('manage-chapter')) {
            abort(403);
        }

        $this->validate([
            'name' => 'required|min:3',
        ]);

        $chapter = Chapter::create([
            'name' => $this->name,
            'course_id' => $this->course_id,
        ]);

        $this->resetInput();

        $this->emit('chapterStored', $chapter);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->course_id = null;
    }
}
