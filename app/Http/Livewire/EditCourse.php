<?php

namespace App\Http\Livewire;

use App\Models\Courses\Course;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditCourse extends ModalComponent
{
    public Course $course;

    public function render()
    {
        dd($this->course);
        return view('courses.edit', compact('course'));
    }
}
