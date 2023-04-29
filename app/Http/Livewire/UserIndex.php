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

    public $paginate = 5;
    public $updateUserRole = false;
    public $name;
    public $role_id;
    public $userId;

    public function render()
    {
        if (!Gate::allows('user_show')) {
            abort(404);
        }

        return view('users.index', [
            'users' => User::with('roles')->latest()->paginate($this->paginate),
            'roles' => Role::all()
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
        if ($id) {
            $data = User::find($id);
            $data->delete();
            $this->updateUserRole = false;
        }
    }

    public function updateRole()
    {
        $user = User::find($this->userId);

        $user->syncRoles($this->role_id);
        session()->flash('message', 'Peran ' . $user->name .  ' telah diubah menjadi ' . $user->getRoleNames()->first());
    }
}
