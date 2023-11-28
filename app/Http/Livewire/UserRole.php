<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class UserRole extends ModalComponent
{
    public User $user;
    public $roles;
    public $role;

    public function mount()
    {
        $this->roles = Role::all();
        $this->role = $this->user->roles->pluck('id')->first();
    }

    public function render()
    {
        return view('users.role');
    }

    public function updateGroupClass()
    {

        $this->user->update([
            'group_class' => $this->group
        ]);

        $this->emit('groupUpdated', $this->user);

        $this->emit('closeModal');
    }

    public function updateRole()
    {
        if (!Gate::allows('user_update')) {
            abort(403);
        }

        $this->user->syncRoles($this->role);

        $this->emit('roleUpdated', $this->user);

        $this->emit('closeModal');
    }
}
