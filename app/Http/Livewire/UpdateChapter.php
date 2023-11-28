<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Chapter;
use App\Models\Courses\Course;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class UpdateChapter extends ModalComponent
{

    public $chapterId;
    public $courses;
    public $name;
    public $course_id;

    public $chapter;


    public function mount()
    {
        $this->chapter = Chapter::find($this->chapterId);
        $this->courses = Course::all();

        $this->name = $this->chapter->name;
        $this->course_id = $this->chapter->course_id;
    }

    public function render()
    {
        return view('courses.chapters.update');
    }

    public function update()
    {
        if (!Gate::allows('chapter_update')) {
            abort(403);
        }

        $this->chapter->update([
            'name' => $this->name,
            'course_id' => $this->course_id,
        ]);

        $this->emit('chapterUpdated', $this->chapter);
        $this->emit('closeModal');
    }
}
