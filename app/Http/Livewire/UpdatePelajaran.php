<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Course;
use App\Models\Courses\Lesson;
use App\Models\Courses\Chapter;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class UpdatePelajaran extends ModalComponent
{
    public $courses;
    public $courseId;


    public $lesson;
    public $name;
    public $chapter_id;
    public $video;

    public $search;

    protected $rules = [
        'name' => 'required|min:5|string',
        'chapter_id' => 'required',
        'video' => 'required|min:11'
    ];

    protected $messages = [
        'min' => ':attribute harus terdiri dari minimal :min karakter.',
        'required' => ':attribute harus diisi.',
        'string' => ':attribute harus berupa string.'
    ];

    protected $validationAttributes = [
        'name' => 'Judul Bab',
        'chapter_id' => 'Bab',
        'video' => 'Video Pembelajaran'
    ];

    public function mount($lessonId)
    {
        $this->lesson = Lesson::find($lessonId);
        $chapter = Chapter::find($this->lesson->chapter_id);

        $this->courses = Course::all();
        $this->name = $this->lesson->name;
        $this->video = $this->lesson->video;
        $this->chapter_id = $chapter->id;
        $this->courseId = $chapter->course->id;
    }

    public function render()
    {
        $chapters = Chapter::where('course_id', $this->courseId)->get();

        return view('courses.lessons.update', compact('chapters'));
    }

    public function update()
    {
        if (!Gate::allows('lesson_update')) {
            abort(403);
        }

        $this->validate();

        $this->lesson->update([
            'name' => $this->name,
            'chapter_id' => $this->chapter_id,
            'video' => $this->video
        ]);

        $this->emit('lessonUpdated', $this->lesson);
        $this->emit('closeModal');
    }
}
