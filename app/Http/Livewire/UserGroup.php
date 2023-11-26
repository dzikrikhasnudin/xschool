<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use LivewireUI\Modal\ModalComponent;

class UserGroup extends ModalComponent
{
    public User $user;
    public $group;

    public function mount()
    {
        $this->group = $this->user->group_class;
    }

    public function render()
    {
        return view('users.group');
    }

    public function updateGroupClass()
    {

        $this->user->update([
            'group_class' => $this->group
        ]);

        $this->emit('groupUpdated', $this->user);

        $this->emit('closeModal');
    }
}
