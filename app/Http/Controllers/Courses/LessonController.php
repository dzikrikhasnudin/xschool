<?php

namespace App\Http\Controllers\Courses;

use Illuminate\Http\Request;
use App\Models\Courses\Course;
use App\Models\Courses\Lesson;
use App\Models\Courses\Chapter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{

    public function index()
    {
        if (!Gate::allows('lesson_show')) {
            abort(404);
        }

        return view('courses.lessons.index');
    }
}
