<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class SearchCategories extends Component
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
        return view('livewire.search-categories', [
            'categories' => Category::query()
                ->when($this->search, function ($query) {
                        return $query->where('name', 'like', "%{$this->search}%");
                })
                ->orderBy('id', 'desc')->paginate(8)
        ]);
    }
}
