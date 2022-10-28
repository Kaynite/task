<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UsersTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $users;
    protected $orderColumns = ['id', 'name', 'is_active'];

    public $orderBy;
    public $search;
    public $role;

    public function mount()
    {
        $this->users = User::where('name', 'LIKE', "%{$this->search}%")->with(['lastLogin', 'media'])->paginate();
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => $this->users,
            'roles' => Role::all(),
        ]);
    }

    public function sort($by)
    {
        if ($this->orderBy == $by) {
            $this->orderBy = null;
            $this->users   = User::orderByDesc($by)->with(['lastLogin', 'media'])->paginate();
        } else {
            $this->orderBy = $by;
            $this->users   = User::orderBy($by)->with(['lastLogin', 'media'])->paginate();
        }
    }

    public function updatedSearch()
    {
        $this->users = User::where('name', 'LIKE', "%{$this->search}%")->with(['lastLogin', 'media'])->paginate();
    }

    public function filter()
    {
        if ($this->role) {
            $this->users = User::role($this->role)->with(['lastLogin', 'media'])->paginate();
        } else {
            $this->users = User::with(['lastLogin', 'media'])->paginate();
        }
    }

    public function resetFilter()
    {
        $this->role = null;
        return $this->mount();
    }
}
