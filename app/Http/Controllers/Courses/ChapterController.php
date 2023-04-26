<?php

namespace App\Http\Controllers\Courses;

use Illuminate\Http\Request;
use App\Models\Courses\Course;
use App\Models\Courses\Chapter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('manage-chapter')) {
            abort(404);
        }

        return view('courses.chapters.index');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('manage-chapter')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string',
        ]);

        if ($validator->fails()) {
            Alert::toast('Chapter must be string', 'error');
            return back();
        }

        Chapter::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
        ]);

        Alert::toast('Data berhasil disimpan', 'success');

        return redirect()->back();
    }
}
