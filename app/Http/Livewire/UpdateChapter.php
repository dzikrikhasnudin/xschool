<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Chapter;
use Illuminate\Support\Facades\Gate;

class UpdateChapter extends Component
{
    public $courses;
    public $chapters;
    public $name;
    public $course_id;
    public $chapterId;
    public $statusUpdate = false;
    public $search;

    protected $listeners = [
        'getChapter' => 'showChapter'
    ];

    public function render()
    {
        return view('courses.chapters.update');
    }

    public function showChapter($chapter)
    {
        $this->name = $chapter['name'];
        $this->course_id = $chapter['course_id'];
        $this->chapterId = $chapter['id'];
    }

    public function update()
    {
        if (!Gate::allows('chapter_update')) {
            abort(403);
        }

        if ($this->chapterId) {
            $chapter = Chapter::find($this->chapterId);
            $chapter->update([
                'name' => $this->name,
                'course_id' => $this->course_id,
            ]);

            $this->resetInput();

            $this->emit('chapterUpdated', $chapter);
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->course_id = null;
    }
}
