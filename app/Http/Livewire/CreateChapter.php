<?php

namespace App\Http\Livewire;

use App\Models\Courses\Chapter;
use App\Models\Courses\Course;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class CreateChapter extends ModalComponent
{
    public $courses;
    public $name;
    public $course_id;

    protected $rules = [
        'name' => 'required|min:5|string',
        'course_id' => 'required'
    ];

    protected $messages = [
        'min' => ':attribute harus terdiri dari minimal 5 karakter.',
        'required' => ':attribute harus diisi.',
        'string' => ':attribute harus berupa string.'
    ];

    protected $validationAttributes = [
        'name' => 'Judul Bab',
        'course_id' => 'Course ID'
    ];

    public function mount()
    {
        $this->courses = Course::all();
    }
    public function render()
    {
        return view('courses.chapters.create');
    }

    public function save()
    {
        if (!Gate::allows('chapter_create')) {
            abort(403);
        }

        $chapter = $this->validate();
        Chapter::create($chapter);

        $this->emit('chapterStored', $chapter);

        $this->emit('closeModal');
    }
}
