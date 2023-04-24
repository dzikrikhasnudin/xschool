<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses\Course;
use App\Models\Courses\Lesson;

class IndexPelajaran extends Component
{

    public $statusUpdate = false;


    protected $listeners = [
        'lessonStored' => 'handleStored',
        'lessonUpdated' => 'handleUpdated'
    ];

    public function render()
    {

        return view('courses.lessons.pelajaran', [
            'courses' => Course::latest()->get(),
            'lessons' => Lesson::latest()->get()
        ]);
    }

    public function getLesson($id)
    {
        $this->statusUpdate = true;
        $lesson = Lesson::find($id);
        $this->emit('getLesson', $lesson);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Lesson::find($id);
            $data->delete();
            session()->flash('message', 'Data pelajaran telah dihapus.');
        }
    }

    public function handleStored($lesson)
    {
        // dd($lesson);
        session()->flash('message', 'Pelajaran baru telah ditambahkan.');
    }

    public function handleUpdated($lesson)
    {
        // dd($lesson);
        session()->flash('message', 'Data pelajaran telah diperbarui.');
    }
}
