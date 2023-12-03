<?php

namespace App\Http\Livewire\College;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class IndexCollege extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $search;
    public $sort = 'ASC';

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    protected $listeners = [
        'collegeStored' => 'handleStored',
        'collegeUpdated' => 'handleUpdated'
    ];

    public function render()
    {
        if ($this->search) {
            $colleges = College::where('nama_ptn', 'like', '%' . $this->search . '%')->orWhere('singkatan', 'like', '%' . $this->search . '%');
        } else {
            $colleges = College::orderBy('nama_ptn', $this->sort);
        }

        return view('kampus.index', [
            'colleges' => $colleges->paginate($this->paginate)
        ])->layout('layouts.app');;
    }

    public function handleStored($college)
    {
        session()->flash('message', 'Data PTN baru telah ditambahkan.');
    }

    public function handleUpdated($college)
    {

        session()->flash('message', 'Data PTN telah diperbarui.');
    }

    public function destroy($id)
    {
        if (!Gate::allows('course_delete')) {
            abort(403);
        }
        if ($id) {
            $data = College::find($id);
            $data->delete();
        }
    }
}
