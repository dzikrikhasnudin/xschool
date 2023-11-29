<?php

namespace App\Http\Livewire;

use App\Models\Courses\Chapter;
use App\Models\Courses\Course;
use App\Models\Courses\Lesson;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class CreateLesson extends ModalComponent
{
    public $courses;
    public $courseId;

    public $name;
    public $chapter_id;
    public $video;

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

    public function mount()
    {
        $this->courses = Course::all();
    }
    public function render()
    {
        $chapters = Chapter::where('course_id', $this->courseId)->get();

        return view('courses.lessons.create', compact('chapters'));
    }

    public function save()
    {
        if (!Gate::allows('lesson_create')) {
            abort(403);
        }

        $lesson = $this->validate();
        Lesson::create($lesson);

        $this->emit('lessonStored', $lesson);

        $this->emit('closeModal');
    }
}
