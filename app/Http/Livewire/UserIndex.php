<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $paginate = 5;

    public function render()
    {
        return view('users.index', [
            'users' => User::with('roles')->latest()->paginate($this->paginate)
        ])
            ->layout('layouts.app');
    }
}
