<?php

namespace App\Http\Controllers\Courses;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Courses\Course;
use App\Models\Courses\Lesson;
use App\Models\Courses\Chapter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
        if (Auth::user()->roles == 'student') {
            $courses = Course::published()->latest()->get();
        } else {
            $courses = Course::all();
        }

        return view('courses.index', [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        if (!Gate::allows('manage-course')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|unique:courses,name',
        ]);

        if ($validator->fails()) {
            Alert::toast('Kelas Sudah Ada', 'error');
            return back();
        }

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $originalName = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('thumbnails', $originalName, 'public');
        } else {
            $path = $request->thumbnail;
        }

        Course::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'thumbnail' => $path,
            'status' => $request->status
        ]);

        Alert::toast('Data berhasil disimpan', 'success');

        return redirect()->back();
    }

    public function show(string $slug)
    {
        $course = Course::where('slug', $slug)->with('chapters')->first();


        return view('courses.detail', compact('course'));
    }

    public function play($course, $lesson)
    {
        $data = Lesson::find($lesson);
        $chapter = Chapter::find($data->chapter_id);
        $videoId = parse_url($data->video)['path'];
        $courseName = Course::where('slug', '=', $course)->first();
        $selectedCourse = Course::where('slug', $course)->with('chapters')->first();

        $next = $chapter->lessons->where('id', '>', $data->id)->first();
        $prev = $chapter->lessons->where('id', '<', $data->id)->sortByDesc('id')->first();


        return view('courses.playing', [
            'data' => $data,
            'chapter' => $chapter,
            'videoId' => $videoId,
            'next' => $next,
            'prev' => $prev,
            'courseName' => $courseName,
            'course' => $selectedCourse

        ]);
    }

    public function update(Request $request, string $id)
    {

        $course = Course::findOrFail($id);

        if (!Gate::allows('manage-course')) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'unique:courses,name,' . $id,
        ]);

        if ($validator->fails()) {
            Alert::toast('Kelas Sudah Ada', 'error');
            return back();
        }

        if ($request->hasFile('thumbnail')) {
            if (Storage::exists('public/' . $request->input('old_image'))) {
                Storage::delete('public/' . $request->input('old_image'));
            }

            $file = $request->file('thumbnail');
            $originalName = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs('thumbnails', $originalName, 'public');
        } else {
            $path = $request->old_image;
        }

        $course->name = $request->input('name');
        $course->slug = Str::slug($request->input('name'));
        $course->thumbnail = $path;
        $course->status = $request->input('status');

        $course->save();

        Alert::toast('Data kelas berhasil diubah', 'success');

        return redirect()->route('kelas.show', $course->slug);
    }

    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        if (!Gate::allows('manage-course')) {
            abort(403);
        }
        if (Storage::exists('public/' . $course->thumbnail)) {
            Storage::delete('public/' . $course->thumbnail);
        }

        $course->delete();
        Alert::toast('Kelas berhasil dihapus', 'success');

        return redirect()->route('kelas.index');
    }
}
