<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Lesson;

class TambahPelajaran extends Component
{
    public $courses;
    public $lessons;
    public $name;
    public $chapter_id;
    public $video;

    public function render()
    {
        return view('courses.lessons.create');
    }

    public function store()
    {

        $this->validate([
            'name' => 'required|min:3',
            'video' => 'required'
        ]);

        $lesson = Lesson::create([
            'name' => $this->name,
            'chapter_id' => $this->chapter_id,
            'video' => $this->video
        ]);

        $this->resetInput();

        $this->emit('lessonStored', $lesson);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->chapter_id = null;
        $this->video = null;
    }
}
