<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\NilaiRapor;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class NilaiRaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('nilai-rapor.index');
    }

    public function create()
    {
        $users = User::where('group_class', 2)->orderBy('name', 'ASC')->get();

        $mataPelajaran = MataPelajaran::all();
        return view('nilai-rapor.create', [
            'mataPelajaran' => $mataPelajaran,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $nilai = NilaiRapor::where('user_id', $request->user_id)->where('semester', $request->semester);

        if ($nilai->exists()) {
            Alert::error("Oops!", "Data Nilai Semester " . $request->semester . " sudah ada.");

            return back()->withInput();
        }

        $keys = array_keys($request->all());

        foreach ($keys as $index => $value) {
            if ($index > 2) {
                NilaiRapor::create([
                    'user_id' => $request->user_id,
                    'pelajaran_id' => $value,
                    'nilai' => $request->get($value),
                    'semester' => $request->semester,
                ]);
            }
        }

        Alert::toast('Data berhasil disimpan', 'success');

        return redirect()->route('nilai-rapor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        if (Auth::user()->getRoleNames()->first() == "Student") {
            abort(403);
        }

        $siswa = User::where('username', $username)->first();
        $nilaiSiswa = NilaiRapor::where('user_id', $siswa->id)->get();

        return view('nilai-rapor.detail', [
            'nilai' => $nilaiSiswa,
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $semester)
    {

        $mataPelajaran = MataPelajaran::all();
        $nilai = NilaiRapor::where('user_id', Auth::user()->id)->where('semester', $semester)->get();

        return view('nilai-rapor.edit', [
            'mataPelajaran' => $mataPelajaran,
            'nilai' => $nilai,
            'semester' => $semester
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $semester)
    {

        $keys = array_keys($request->all());

        foreach ($keys as $index => $id) {
            if ($index > 2) {
                $nilai = NilaiRapor::find($id);

                $nilai->update([
                    'nilai' => $request->input($id)
                ]);
            }
        }

        Alert::toast('Data nilai Semester ' . $semester . ' berhasil diperbarui', 'success');

        return redirect()->route("nilai-rapor.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user, $semester)
    {
        dd($semester);
        $nilai = NilaiRapor::where('user_id', $user)->where('semester', $semester)->get();

        foreach ($nilai as $data) {
            $data->delete();
        }

        return redirect()->route('nilai-rapor.index');
    }
}
