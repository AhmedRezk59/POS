@extends('layouts.app')

@section('header')
    @include('dashboard.partials.__header', [
        'pageName' => __('site.invoices'),
        'mainRoute' => route('dashboard.invoices.index'),
        'subname' => __('site.add'),
        'subRoute' => route('dashboard.invoices.create'),
    ])
@endsection

@section('content')
   <div class="card py-3 px-3">
     <form class="needs-validation" action="{{ route('dashboard.invoices.store') }}" method="POST"
         enctype="multipart/form-data">
         @csrf
         <div class="form-row">
             <div class="col-xl-12 mb-3">
                 <label for="validationTooltip01">{{ __('site.buyer') }}</label>
                 <input type="text" name="buyer" class="form-control" id="validationTooltip01"
                     placeholder="{{ __('site.buyer') }}" value="{{ old('buyer', '') }}">
                 @error('buyer')
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
