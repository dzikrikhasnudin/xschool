<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Courses\Course;
use App\Models\Courses\Lesson;
use Illuminate\Database\Eloquent\Builder;

class IndexPelajaran extends Component
{
    use WithPagination;

    public $statusUpdate = false;
    public $paginate = 5;
    public $search;

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    protected $listeners = [
        'lessonStored' => 'handleStored',
        'lessonUpdated' => 'handleUpdated'
    ];

    public function render()
    {

        return view('courses.lessons.pelajaran', [
            'courses' => Course::latest()->get(),
            'lessons' => $this->search === null ?
                Lesson::latest()->paginate($this->paginate) :
                Lesson::where('name', 'like', '%' . $this->search . '%')
                ->orWhereHas('chapter', function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })->paginate($this->paginate)

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
            $this->statusUpdate = false;
        }
    }

    public function handleStored($lesson)
    {
        session()->flash('message', 'Pelajaran baru telah ditambahkan.');
    }

    public function handleUpdated($lesson)
    {

        $this->statusUpdate = false;
        session()->flash('message', 'Data pelajaran telah diperbarui.');
    }
}
