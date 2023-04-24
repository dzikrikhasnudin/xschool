<?php

use App\Http\Controllers\Courses\ChapterController;
use App\Http\Controllers\Courses\CourseController;
use App\Http\Controllers\Courses\LessonController;
use App\Http\Livewire\IndexPelajaran;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('kelas', CourseController::class);
    Route::get('kelas/{course}/{lesson}', [CourseController::class, 'play'])->name('course.playing');
    Route::resource('bab', ChapterController::class);
    Route::resource('pelajaran', LessonController::class);
});
