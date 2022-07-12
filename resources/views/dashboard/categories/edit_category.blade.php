@extends('layouts.app')

@section('header')
    @include('dashboard.partials.__header', [
        'pageName' => __('site.categories'),
        'mainRoute' => route('dashboard.categories.index'),
        'subname' => __('site.edit'),
        'subRoute' => route('dashboard.categories.create'),
    ])
@endsection

@section('content')
    <div class="card py-3 px-3">
        <form class="needs-validation" action="{{ route('dashboard.categories.update' , $category->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip01">{{ __('site.name') }}</label>
                    <input type="text" name="name" class="form-control" id="validationTooltip01"
                        placeholder="{{ __('site.name') }}" value="{{ $category->name }}">
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
