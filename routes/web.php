<?php

use App\Http\Controllers\Courses\ChapterController;
use App\Http\Controllers\Courses\CourseController;
use App\Http\Controllers\Courses\LessonController;
use App\Http\Controllers\Courses\QuizController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NilaiRaporController;
use App\Http\Livewire\College\IndexCollege;
use App\Http\Livewire\IndexPelajaran;
use App\Http\Livewire\UserIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\IndexModul;
use App\Http\Livewire\IndexNilaiRapor;
use App\Http\Livewire\NilaiTryout\CreateTryout;
use App\Http\Livewire\NilaiTryout\DetailTryout;
use App\Http\Livewire\NilaiTryout\EditTryout;
use App\Http\Livewire\NilaiTryout\IndexTryout;
use App\Http\Livewire\NilaiTryout\Leaderboard;
use App\Http\Livewire\Utbk\IndexScore;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('kuis-bahasa-indonesia-1', function () {
    return redirect('https://forms.gle/DxwoQsnzbpaBk3hc6');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('kelas', CourseController::class)->except(['edit']);
    Route::get('kelas/{course}/{lesson}', [CourseController::class, 'play'])->name('course.playing');
    Route::get('bab', [ChapterController::class, 'index'])->name('chapter.index');
    Route::get('pelajaran', [LessonController::class, 'index'])->name('lesson.index');
    Route::get('user', UserIndex::class)->name('user.index');
    Route::get('modul', IndexModul::class)->name('modul.index');
    Route::resource('nilai-rapor', NilaiRaporController::class)->except('edit', 'destroy', 'update');
    Route::get('nilai-rapor/semester-{semester}/edit', [NilaiRaporController::class, 'edit'])->name('nilai-rapor.edit');
    Route::delete('nilai-rapor/{user}/semester-{semester}', [NilaiRaporController::class, 'destroy'])->name('nilai-rapor.destroy');
    Route::put('nilai-rapor/semester-{semester}', [NilaiRaporController::class, 'update'])->name('nilai-rapor.update');
    Route::get('/daftar-ptn', IndexCollege::class)->name('college.index');
    Route::get('/skor-utbk', IndexScore::class)->name('score.index');
    Route::get('/nilai-tryout', IndexTryout::class)->name('nilai-tryout.index');
    Route::get('/nilai-tryout/tambah', CreateTryout::class)->name('nilai-tryout.create');
    Route::get('/nilai-tryout-{batch}/{username}', DetailTryout::class)->name('nilai-tryout.detail');
    Route::get('/nilai-tryout/{id}/edit', EditTryout::class)->name('nilai-tryout.edit');
    Route::get('/leaderboard-tryout-{batch}/', Leaderboard::class)->name('nilai-tryout.leaderboard');
});
