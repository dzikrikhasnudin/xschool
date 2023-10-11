<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Courses\Modul;
use App\Models\Courses\Course;

class IndexModul extends Component
{
    use WithPagination;

    public $paginate = 5;
    public $updateModul = false;
    public $search;

    protected $listeners = [
        'modulStored' => 'handleStored',
        'modulUpdated' => 'handleUpdated'
    ];

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('courses.moduls.index', [
            'courses' => Course::latest()->get(),
            'moduls' => $this->search == null ?
                Modul::latest()->paginate($this->paginate) :
                Modul::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ])
            ->layout('layouts.app');
    }

    public function getModul($id)
    {
        $this->updateModul = true;
        $modul = Modul::find($id);
        $this->emit('getModul', $modul);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Modul::find($id);
            $data->delete();
            $this->updateModul = false;
        }
    }

    public function handleStored($modul)
    {
        session()->flash('message', 'Modul baru telah ditambahkan.');
    }

    public function handleUpdated($modul)
    {

        $this->updateModul = false;
        session()->flash('message', 'Data modul telah diperbarui.');
    }
}
