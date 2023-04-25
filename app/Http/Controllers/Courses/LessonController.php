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
        return view('courses.lessons.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        if (!Gate::allows('manage-course')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'video' => 'string',
        ]);

        if ($validator->fails()) {
            Alert::toast('Lessons must be string', 'error');
            return back();
        }

        Lesson::create([
            'name' => $request->name,
            'video' => $request->video,
            'chapter_id' => $request->chapter_id,
        ]);

        Alert::toast('Data berhasil disimpan', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
