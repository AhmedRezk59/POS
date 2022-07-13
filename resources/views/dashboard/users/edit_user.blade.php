@extends('layouts.app')

@section('header')
    @include('dashboard.partials.__header', [
        'pageName' => __('site.users'),
        'mainRoute' => route('dashboard.users.index'),
        'subname' => __('site.edit'),
        'subRoute' => route('dashboard.users.edit', $user->id),
    ])
@endsection

@section('content')
    <div class="card py-3 px-3">
        <form class="needs-validation" action="{{ route('dashboard.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip01">{{ __('site.first_name') }}</label>
                    <input type="text" name="first_name" class="form-control" id="validationTooltip01"
                        placeholder="{{ __('site.first_name') }}" value="{{ $user->first_name }}">
                    @error('first_name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip02">{{ __('site.last_name') }}</label>
                    <input type="text" name="last_name" class="form-control" id="validationTooltip02"
                        placeholder="{{ __('site.last_name') }}" value="{{ $user->last_name }}">
                    @error('last_name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-12 mb-3">
                    <label for="validationTooltipUsername">{{ __('site.email') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                        </div>
                        <input type="email" name="email" class="form-control" id="validationTooltipUsername"
                            placeholder="{{ __('site.email') }}" aria-describedby="validationTooltipUsernamePrepend"
                            value="{{ $user->email }}">
                    </div>
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-12 mb-3">
                    <label for="validationTooltip02">{{ __('site.image') }}</label>
                    <input type="file" name="image" class="form-control image" id="validationTooltip02"
                        placeholder="{{ __('site.image') }}">
                    @error('image')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-12 mb-3">
                    <img width="100px" src="{{ $user->image_path }}" class="image-preview"
                        alt="user image">
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip02">{{ __('site.password') }}</label>
                    <input type="password" name="password" class="form-control" id="validationTooltip02"
                        placeholder="{{ __('site.password') }}">
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label for="validationTooltip02">{{ __('site.password_confirmation') }}</label>
                    <input type="password" name="password_confirmation" class="form-control" id="validationTooltip02"
                        placeholder="{{ __('site.password_confirmation') }}">
                    @error('password_confirmation')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label class="h5" for="validationTooltip02">{{ __('site.permissions') }}</label>
                    <div class="tab round">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($models as $index => $model)
                                <li class="nav-item">
                                    <a @class([
                                        'nav-link show' => true,
                                        'active' => $index == 0,
                                    ]) id="{{ $model }}-tab" data-toggle="tab"
                                        href="#{{ $model }}" role="tab" aria-controls="{{ $model }}"
                                        aria-selected="true">
                                        <i class="fa fa-{{ $model }}"></i> @lang('site.' .$model)</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content mx-3 font-bold lead">
                            @foreach ($models as $index => $model)
                                <div @class([
                                    'tab-pane fade show' => true,
                                    'active' => $index == 0,
                                ]) id="{{ $model }}" role="tabpanel"
                                    aria-labelledby="{{ $model }}-tab">
                                    @foreach ($actions as $action)
                                        <div>
                                            <input type="checkbox" name="permissions[]"
                                                value="{{ $action }}_{{ $model }}" id="customCheck1"
                                                @checked($user->hasPermission("{$action}_{$model}"))>
                                            <label class="custom-control-label"
                                                for="customCheck1">@lang("site.$action")</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary font-bold px-3" type="submit">{{ __('site.update') }}</button>
        </form>
    </div>
@endsection
