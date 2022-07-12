<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{  LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/images/favicon.ico') }}" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/css/style.css') }}" />

</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        <!--=================================
 login-->

        <section class="height-100vh d-flex align-items-center page-section-ptb login">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-4 offset-lg-1 col-md-6 login-fancy-bg bg parallax">
                        <div class="login-fancy">
                            <h2 class="text-white mb-20">{{ __('auth.hello') }}</h2>
                            <p class="mb-20 text-white">{{ __('auth.registerHere') }}</p>
                            <ul class="list-unstyled pos-bot pb-30">
                                <li class="list-inline-item"><a class="text-white"
                                        href="#">{{ __('auth.termsOfUse') }}</a> </li>
                                <li class="list-inline-item"><a class="text-white"
                                        href="#">{{ __('auth.termsOfPrivacy') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bg-white">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="login-fancy pb-40 clearfix">
                                <h3 class="mb-30">{{ __('auth.signup') }}</h3>
                                <div class="row">
                                    <label class="mb-10" for="name">{{ __('auth.name') }}* </label>
                                    <input id="name" class="web form-control" type="text"
                                        placeholder="{{ __('auth.name') }}" name="name">
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class=" mb-20">
                                    <div class="row">
                                        <label class="mb-10" for="email">{{ __('auth.email') }}* </label>
                                        <input type="email" placeholder="{{ __('auth.email') }}" id="email"
                                            class="form-control" name="email">
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" mb-20">
                                    <div class="row">
                                        <label class="mb-10" for="password">{{ __('auth.password') }}*
                                        </label>
                                        <input class="Password form-control" id="password" type="password"
                                            placeholder="{{ __('auth.password') }}" name="password">
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" mb-20">
                                    <div class="row">
                                        <label class="mb-10"
                                            for="password_confirmation">{{ __('auth.passwordConfirmation') }}*
                                        </label>
                                        <input class="Password form-control" id="password_confirmation" type="password"
                                            placeholder="{{ __('auth.password') }}" name="password_confirmation">
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="button">
                                    <span>{{ __('auth.signup') }}</span>
                                    <i class="fa fa-check"></i>
                                </button>
                                <p class="mt-20 mb-0">{{ __('auth.hasAccount') }} <a class="text-primary"
                                        href="{{ route('login') }}"> {{ __('auth.login') }}</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>



    <!--=================================
 jquery -->

    <!-- jquery -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/jquery-3.3.1.min.js') }}"></script>

    <!-- plugins-jquery -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = "{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/') }}"
    </script>

    <!-- chart -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/chart-init.js') }}"></script>

    <!-- calendar -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/calendar.init.js') }}"></script>

    <!-- charts sparkline -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/sparkline.init.js') }}"></script>

    <!-- charts morris -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/morris.init.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/datepicker.js') }}"></script>

    <!-- sweetalert2 -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/sweetalert2.js') }}"></script>

    <!-- toastr -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/toastr.js') }}"></script>

    <!-- validation -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/validation.js') }}"></script>

    <!-- lobilist -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/lobilist.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset( LaravelLocalization::getCurrentLocaleDirection() . '/js/custom.js') }}"></script>

</body>

</html>
