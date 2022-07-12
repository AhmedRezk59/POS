<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUsers extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1]
    ];
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.search-users', [
            'users' => User::whereRoleIs('admin')
                ->when($this->search, function ($query) {
                    return $query->where(function ($q) {
                        return $q->where('first_name', 'like', "%{$this->search}%")
                            ->orWhere('last_name', 'like', "%{$this->search}%")
                            ->orWhere('email', 'like', "%{$this->search}%");
                    });
                })
                ->orderBy('id', 'desc')->paginate(8)
        ]);
    }
}
