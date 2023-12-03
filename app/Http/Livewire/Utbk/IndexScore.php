<?php

namespace App\Http\Livewire\Utbk;

use Livewire\Component;
use App\Models\SkorUtbk;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class IndexScore extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $sort = 'ASC';
    public $search;
    public $filterPtn;

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    protected $listeners = [
        'scoreStored' => 'handleStored',
        'scoreUpdated' => 'handleUpdated'
    ];

    public function render()
    {
        $scores = SkorUtbk::with('kampus')->orderBy('program_studi', $this->sort);
        $campus = SkorUtbk::distinct()->get('ptn_id');

        if ($this->filterPtn) {
            $scores->where('ptn_id', $this->filterPtn);
        }

        if ($this->search) {
            $scores->where('program_studi', 'like', '%' . $this->search . '%');
        }

        return view('skor-utbk.index', [
            'scores' => $scores->paginate($this->paginate),
            'campus' => $campus
        ])->layout('layouts.app');
    }

    public function handleStored($score)
    {
        session()->flash('message', 'Data Skor UTBK telah ditambahkan.');
    }

    public function handleUpdated($score)
    {

        session()->flash('message', 'Data Skor UTBK telah diperbarui.');
    }

    public function destroy($id)
    {
        if (!Gate::allows('course_delete')) {
            abort(403);
        }
        if ($id) {
            $data = SkorUtbk::find($id);
            $data->delete();
        }
    }
}
