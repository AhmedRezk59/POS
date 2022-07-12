<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Livewire\Component;

class AddInvoiceProducts extends Component
{
    public $invoice;
    public $products = [];
    public $quantity = 0 ;
    public $categoryID = "";
    public $product_id = '' ;
    protected $listeners = [
        'productID' => 'setProductId',
        'totalDecrease' => 'decreaseTotal'
    ];
    protected $rules =[
        'quantity' => ['required' , 'numeric','min:1' ],
        'product_id' => ['required' , 'exists:products,id']
    ];
    public function  setProductId($value)
    {
        $this->product_id = $value;
    }
    public function updated ($categoryID)
    {
        $this->getProducts();
    }
  
    private function getProducts(){
            $this->products = Product::where('category_id' , $this->categoryID)->get();
            $this->emit('productsUpdated');
    }

    public function insertInvoiceProducts ()
    {
        $this->validate();
       $this->invoice->products()->attach($this->product_id,[
        'price' => Product::where('id',$this->product_id)->value('price_sell') ,
        'quantity' => $this->quantity,
        ]);
        $this->emit('productInserted');
        $this->updateTotal();
    }

    public function updateTotal ()
    {
        $this->invoice->update([
            'total' => $this->invoice->total + ($this->quantity * Product::find($this->product_id)->price_sell)
        ]);
    }
    public function decreaseTotal ($total)
    {
        $this->invoice = $this->invoice->fresh();
    }
    public function render()
    {
        return view('livewire.add-invoice-products',[
            'categories' => Category::select(['id','name'])->get()
        ]);
    }
}
