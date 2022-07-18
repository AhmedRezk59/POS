@extends('layouts.app')

@section('header')
    @include('dashboard.partials.__header', [
        'pageName' => __('site.products'),
        'mainRoute' => route('dashboard.products.index'),
        'subname' => __('site.add'),
        'subRoute' => route('dashboard.products.create'),
    ])
@endsection

@section('content')
    <div class="card py-3 px-3">
        <form class="needs-validation" action="{{ route('dashboard.products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-xl-12 mb-3">
                    <label for="validationTooltip01">{{ __('site.name') }}</label>
                    <input type="text" name="name" class="form-control" id="validationTooltip01"
                        placeholder="{{ __('site.name') }}" value="{{ old('name', '') }}">
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip01">{{ __('site.price_bought') }}</label>
                    <input type="text" name="price_bought" class="form-control" id="validationTooltip01"
                        placeholder="{{ __('site.price_bought') }}" value="{{ old('price_bought', '') }}">
                    @error('price_bought')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip01">{{ __('site.price_sell') }}</label>
                    <input type="text" name="price_sell" class="form-control" id="validationTooltip01"
                        placeholder="{{ __('site.price_sell') }}" value="{{ old('price_sell', '') }}">
                    @error('price_sell')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip01">{{ __('site.quantity') }}</label>
                    <input type="text" name="quantity" class="form-control" id="validationTooltip01"
                        placeholder="{{ __('site.quantity') }}" value="{{ old('quantity', '') }}">
                    @error('quantity')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip01">{{ __('site.category') }}</label>
                    <select name="category_id" style="padding:10px" class="form-control" id="validationTooltip01"
                        value="{{ old('category_id', '') }}">
                        <option value="" selected disabled>@lang('site.select')</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip01">{{ __('site.sizes') }}</label>
                    <select name="size_id" style="padding:10px" class="form-control" id="validationTooltip01"
                        value="{{ old('size_id', '') }}">
                        <option value="" selected disabled>@lang('site.select')</option>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                    @error('size_id')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary font-bold px-3" type="submit">{{ __('site.add') }}</button>
        </form>
    </div>
@endsection
