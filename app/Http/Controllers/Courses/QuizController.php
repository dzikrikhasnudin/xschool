<?php

namespace App\Http\Controllers\Courses;

use App\Models\Courses\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function index()
    {
        $quizs = Quiz::all();
        return view('courses.quiz.index', compact('quizs'));
    }

    public function create()
    {
        return view('courses.quiz.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'course_id' => 'required',
                'soal' => 'required',
                'pertanyaan' => 'required',
                'pilihan_a' => 'required',
                'pilihan_b' => 'required',
                'pilihan_c' => 'required',
                'pilihan_d' => 'required',
                'pilihan_e' => 'required',
                'jawaban' => 'required'
            ]
        );

        Quiz::create(
            [
                'course_id' => $request->course_id,
                'soal,' => $request->soal,
                'pertanyaan' => $request->pertanyaan,
                'pilihan_a' => $request->pilihan_a,
                'pilihan_b' => $request->pilihan_b,
                'pilihan_c' => $request->pilihan_c,
                'pilihan_d' => $request->pilihan_d,
                'pilihan_e' => $request->pilihan_e,
                'jawaban' => $request->jawaban
            ]
        );

        return redirect('kuis')->with('sukses', 'Berhasil Tambah Data!');
    }

    public function show($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        return view('courses.quiz.show', compact('quiz'));
    }

    public function edit($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        return view('courses.quiz.edit', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'course_id' => 'required',
                'soal' => 'required',
                'pertanyaan' => 'required',
                'pilihan_a' => 'required',
                'pilihan_b' => 'required',
                'pilihan_c' => 'required',
                'pilihan_d' => 'required',
                'pilihan_e' => 'required',
                'jawaban' => 'required'
            ]
        );

        $quiz = Quiz::where('id', $id)->first();
        $quiz->update(
            [
                'course_id' => $request->course_id,
                'soal,' => $request->soal,
                'pertanyaan' => $request->pertanyaan,
                'pilihan_a' => $request->pilihan_a,
                'pilihan_b' => $request->pilihan_b,
                'pilihan_c' => $request->pilihan_c,
                'pilihan_d' => $request->pilihan_d,
                'pilihan_e' => $request->pilihan_e,
                'jawaban' => $request->jawaban
            ]
        );

        return redirect('kuis')->with('sukses', 'Berhasil Edit Data!');
    }

    public function destroy($id)
    {
        $data = Quiz::where('id', $id)->first();
        $data->delete();

        return redirect('kuis')->with('sukses', 'Berhasil Hapus Data!');
    }
}
