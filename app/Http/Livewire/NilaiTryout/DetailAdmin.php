<?php

namespace App\Http\Livewire\NilaiTryout;

use Livewire\Component;
use App\Models\NilaiTryout;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class DetailAdmin extends Component
{
    use WithPagination;

    public $batch;

    public function render()
    {
        $scores = NilaiTryout::where('batch', $this->batch)->paginate(5);


        return view('nilai-tryout._admin', [
            'scores' => $scores
        ]);
    }

    public function destroy($id)
    {
        if (!Gate::allows('course_delete')) {
            abort(403);
        }
        if ($id) {
            $data = NilaiTryout::find($id);
            $data->delete();
        }
    }
}
