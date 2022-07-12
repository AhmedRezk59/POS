@extends('layouts.app')

@section('header')
    @include('dashboard.partials.__header', [
        'pageName' => __('site.sizes'),
        'mainRoute' => route('dashboard.sizes.index'),
        'subname' => __('site.edit'),
        'subRoute' => route('dashboard.sizes.create'),
    ])
@endsection

@section('content')
    <div class="card py-3 px-3">
        <form class="needs-validation" action="{{ route('dashboard.sizes.update' , $size->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip01">{{ __('site.name') }}</label>
                    <input type="text" name="name" class="form-control" id="validationTooltip01"
                        placeholder="{{ __('site.name') }}" value="{{ $size->name }}">
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>

            <button class="btn btn-primary font-bold px-3" type="submit">{{ __('site.update') }}</button>
        </form>
    </div>
@endsection
