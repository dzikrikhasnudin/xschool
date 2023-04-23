<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use LivewireUI\Modal\ModalComponent;

class CreateCourses extends ModalComponent
{
    public function render()
    {
        return view('courses.create');
    }
}
