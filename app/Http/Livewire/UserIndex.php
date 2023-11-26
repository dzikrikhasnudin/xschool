<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class UserIndex extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $angkatan = 2;
    public $updateUserRole = false;
    public $name;
    public $role_id;
    public $userId;
    public $search;
    public $sort = 'ASC';

    protected $queryString = ['search'];
    protected $listeners = [
        'groupUpdated' => 'handleGroupUpdated',
    ];


    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        if (!Gate::allows('user_show')) {
            abort(404);
        }

        return view('users.index', [
            'roles' => Role::all(),
            'users' => $this->search === null ?
                User::with('roles')->where('group_class', $this->angkatan)->orderBy('name', $this->sort)->paginate($this->paginate) :
                User::where('name', 'like', '%' . $this->search . '%')->where('group_class', $this->angkatan)->with('roles')->orderBy('name', $this->sort)->paginate($this->paginate)
        ])
            ->layout('layouts.app');
    }

    public function getUser($id)
    {
        $user = User::find($id);
        $this->name = $user->name;
        $this->role_id = $user->roles->pluck('id')->first();
        $this->userId = $user->id;
    }

    public function destroy($id)
    {
        if (!Gate::allows('user_delete')) {
            abort(403);
        }
        if ($id) {
            $data = User::find($id);
            $data->delete();
            $this->updateUserRole = false;
        }
    }

    public function updateRole()
    {
        if (!Gate::allows('user_update')) {
            abort(403);
        }

        $user = User::find($this->userId);

        $user->syncRoles($this->role_id);
        session()->flash('message', 'Peran ' . $user->name .  ' telah diubah menjadi ' . $user->getRoleNames()->first());
    }

    public function handleGroupUpdated($user)
    {
        session()->flash('message', $user['name'] . ' telah dimasukkan ke angkatan ' . $user['group_class']);
    }
}
