<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProducts extends Component
{
    use WithPagination;

    public $search = '';
    public $amountNotSufficent = false;
    public $amount = 2;
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
        return view('livewire.search-products', [
            'products' => Product::query()
            ->when($this->search, function ($query) {
                    return $query->where('name', 'like', "%{$this->search}%");
            })
            ->when($this->amountNotSufficent , function($query){
                return $query->where('quantity' ,'<' ,$this->amount );
            })
            ->with(['category','size'])
            ->orderBy('id', 'desc')->paginate(8)
        ]);
    }
}
