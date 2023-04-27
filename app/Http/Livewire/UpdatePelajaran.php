<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Lesson;
use Illuminate\Support\Facades\Gate;

class UpdatePelajaran extends Component
{
    public $courses;
    public $lessons;
    public $name;
    public $chapter_id;
    public $video;
    public $lessonId;
    public $statusUpdate = false;
    public $search;

    protected $listeners = [
        'getLesson' => 'showLesson'
    ];

    public function render()
    {
        return view('courses.lessons.update');
    }

    public function showLesson($lesson)
    {
        $this->name = $lesson['name'];
        $this->chapter_id = $lesson['chapter_id'];
        $this->video = $lesson['video'];
        $this->lessonId = $lesson['id'];
    }

    public function update()
    {
        if (!Gate::allows('lesson_update')) {
            abort(403);
        }

        if ($this->lessonId) {
            $lesson = Lesson::find($this->lessonId);
            $lesson->update([
                'name' => $this->name,
                'chapter_id' => $this->chapter_id,
                'video' => $this->video
            ]);


            $this->resetInput();

            $this->emit('lessonUpdated', $lesson);
        }
    }

    private function resetInput()
    {
        $this->name = null;
        $this->chapter_id = null;
        $this->video = null;
    }
}
