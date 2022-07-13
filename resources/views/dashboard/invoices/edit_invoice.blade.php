@extends('layouts.app')

@section('header')
    @include('dashboard.partials.__header', [
        'pageName' => __('site.invoices'),
        'mainRoute' => route('dashboard.invoices.index'),
        'subname' => __('site.edit'),
        'subRoute' => route('dashboard.invoices.edit', $invoice->id),
    ])
@endsection

@section('content')
    @livewire('invoice-products',['invoice' => $invoice])
    @livewire('add-invoice-products',['invoice' => $invoice])
@endsection
