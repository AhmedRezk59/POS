<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Models\Invoice;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_invoices'])->only('index');
        $this->middleware(['permission:create_invoices'])->only(['create', 'store']);
        $this->middleware(['permission:update_invoices'])->only(['update', 'edit']);
        $this->middleware(['permission:delete_invoices'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.invoices.index_invoices');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.invoices.create_invoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        $invoice = Invoice::create([
            ...$request->validated(),
            'user_id' => auth()->user()->id
        ]);
        session()->flash('success', __('site.added_successfully'));
        return to_route('dashboard.invoices.edit', $invoice->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('dashboard.invoices.edit_invoice', compact('invoice'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.invoices.index');
    }

    public function print($id) {
        $invoice = Invoice::find($id);
        $products = $this->prepare($invoice->products);
        $total = DB::select('SELECT SUM(price * quantity) as total from invoice_product where invoice_id = ? ;', [$id]);
         return view('dashboard.pdf.invoice' , [
        'products' => $products,
        'invoice' => $invoice,
        'total_sum' => $total[0]->total ?? 0
      ]);
    }

    public function prepare ($products)
    {
       return collect($products)->map(function($product){
            return collect($product)->merge([
                'size' => $product->size->name,
                'total' => $product->pivot->price * $product->pivot->quantity,
            ]);
        });
    }

}
