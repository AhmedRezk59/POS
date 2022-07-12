<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class SearchInvoices extends Component
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
        return view('livewire.search-invoices', [
            'invoices' => Invoice::query()
            ->when($this->search, function ($query) {
                return $query->where(function ($q) {
                    return $q->where('buyer', 'like', "%{$this->search}%")
                    ->orWhere('total', 'like', "%{$this->search}%");
                });
            })
            ->with('user')
            ->orderBy('id', 'desc')->paginate(8)
        ]);
    }
}
