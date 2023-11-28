<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Courses\Course;
use App\Models\Courses\Chapter;
use Illuminate\Database\Eloquent\Builder;

class IndexChapter extends Component
{

    use WithPagination;

    public $statusUpdate = true;
    public $paginate = 10;
    public $search;

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    protected $listeners = [
        'chapterStored' => 'handleStored',
        'chapterUpdated' => 'handleUpdated'
    ];

    public function render()
    {
        return view('courses.chapters.chapter', [
            'courses' => Course::latest()->get(),
            'chapters' => $this->search === null ?
                Chapter::latest()->paginate($this->paginate) :
                Chapter::where('name', 'like', '%' . $this->search . '%')
                ->orWhereHas('course', function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })->paginate($this->paginate)
        ]);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Chapter::find($id);
            $data->delete();
            $this->statusUpdate = false;
        }
    }

    public function handleStored($chapter)
    {
        session()->flash('message', 'Bab baru telah ditambahkan.');
    }

    public function handleUpdated($chapter)
    {

        session()->flash('message', 'Data bab telah diperbarui.');
    }
}
