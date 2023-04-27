<?php

use App\Http\Controllers\Courses\ChapterController;
use App\Http\Controllers\Courses\CourseController;
use App\Http\Controllers\Courses\LessonController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\IndexPelajaran;
use App\Http\Livewire\UserIndex;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('kelas', CourseController::class)->except(['edit']);
    Route::get('kelas/{course}/{lesson}', [CourseController::class, 'play'])->name('course.playing');
    Route::resource('bab', ChapterController::class)->except(['update', 'destroy', 'edit', 'show']);
    Route::resource('pelajaran', LessonController::class)->except(['update', 'destroy', 'edit', 'show']);
    Route::get('user', UserIndex::class)->name('user.index');
});
