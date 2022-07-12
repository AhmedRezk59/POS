<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
class InvoiceProducts extends Component
{
    use WithPagination;

    public $products = [];
    public $invoice;
    public $total;
    
    protected $listeners = [
        'productInserted' => 'getProducts',
    ];
    
    public function mount ($invoice)
    {
        $this->invoice = $invoice;
        $this->total = $invoice->total;
        $this->resetPage();
        $this->getProducts();
    }
    
    public function getProducts ()
    {
        $this->products = $this->invoice->products;
    }

    public function detachInvoiceProducts ($id)
    {
        $this->invoice->products()->detach($id);
        $this->getProducts();
        $this->updateTotal($id);
    }

    public function updateTotal ($id)
    {
        $detachedTotal = DB::select('SELECT SUM(price * quantity) as total from invoice_product where product_id = ? AND invoice_id = ? ;' , [$id , $this->invoice->id]);
        $this->invoice->update([
            'total' => $this->total - $detachedTotal[0]->total
        ]);
        $this->total = $this->total - $detachedTotal[0]->total;
        $this->emit('totalDecrease' , $this->total);
    }

    public function render()
    {
        return view('livewire.invoice-products',[
            'products' => $this->invoice->products
        ]
);
    }
}
