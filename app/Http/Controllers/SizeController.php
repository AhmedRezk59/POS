<?php

namespace App\Http\Controllers;

use App\Http\Requests\Size\StoreSizeRequest;
use App\Http\Requests\Size\UpdateSizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read_sizes'])->only('index');
        $this->middleware(['permission:create_sizes'])->only(['create', 'store']);
        $this->middleware(['permission:update_sizes'])->only(['update', 'edit']);
        $this->middleware(['permission:delete_sizes'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sizes.index_sizes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sizes.create_size');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSizeRequest $request)
    {
        Size::create($request->validated());
        session()->flash('success', __('site.added_successfully'));
        return to_route('dashboard.sizes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('dashboard.sizes.edit_size',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $size->update($request->validated());
        session()->flash('success', __('site.updated_successfully'));
        return to_route('dashboard.sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.sizes.index');
    }
}
