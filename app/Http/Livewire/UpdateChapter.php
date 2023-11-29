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

    protected $rules = [
        'name' => 'required|min:5|string',
        'course_id' => 'required'
    ];

    protected $messages = [
        'min' => ':attribute harus terdiri dari minimal :min karakter.',
        'required' => ':attribute harus diisi.',
        'string' => ':attribute harus berupa string.'
    ];

    protected $validationAttributes = [
        'name' => 'Judul Bab',
        'course_id' => 'Course ID'
    ];


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

        $this->validate();

        $this->chapter->update([
            'name' => $this->name,
            'course_id' => $this->course_id,
        ]);

        $this->emit('chapterUpdated', $this->chapter);
        $this->emit('closeModal');
    }
}
