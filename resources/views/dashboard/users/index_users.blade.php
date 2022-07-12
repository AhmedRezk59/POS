@extends('layouts.app')

@section('header')
    @include('dashboard.partials.__header', [
        'pageName' => __('site.users'),
        'mainRoute' => route('dashboard.users.index'),
        'subname' => null,
    ])
@endsection
@section('content')
    <div class="card py-3 px-3">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
       @livewire('search-users')
    </div>
@endsection
