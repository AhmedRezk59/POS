<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/images/favicon.ico') }}" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" />
    <!-- alpine js -->
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    <!-- css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/css/style.css') }}" />
        <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/jquery-3.3.1.min.js') }}"></script>
    @livewireStyles

</head>

<body>
    <div class="wrapper">
        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ asset('images/pre-loader/loader-01.svg') }}" alt="" />
        </div>

        <!--=================================
 preloader -->

        <!--=================================
 header start-->

        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="/"><img
                        src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/images/logo-dark.png') }}"
                        alt="" /></a>
                <a class="navbar-brand brand-logo-mini" href="/"><img
                        src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/images/logo-icon-dark.png') }}"
                        alt="" /></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search" />
                            <button class="search-button" type="submit">
                                <i class="fa fa-search not-click"></i>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">05</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">New registered user
                            <small class="float-right text-muted time">Just now</small>
                        </a>
                        <a href="#" class="dropdown-item">New invoice received
                            <small class="float-right text-muted time">22 mins</small>
                        </a>
                        <a href="#" class="dropdown-item">Server error report<small
                                class="float-right text-muted time">7 hrs</small>
                        </a>
                        <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1
                                days</small>
                        </a>
                        <a href="#" class="dropdown-item">Order confirmation<small
                                class="float-right text-muted time">2 days</small>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="true">
                        <i class="ti-view-grid"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big">
                        <div class="dropdown-header">
                            <strong>Quick Links</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                                <h5>New Task</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                                <h5>Assign Task</h5>
                            </a>
                        </div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                                <h5>Add Orders</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-truck text-danger"></i>
                                <h5>New Orders</h5>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ auth()->user()->image_path }}" alt="avatar" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">{{ auth()->user()->name }}</h5>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                        <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                        <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects
                            <span class="badge badge-info">6</span>
                        </a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i
                                    class="text-danger ti-unlock"></i>{{ __('auth.logout') }}</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->

        <!--=================================
 Main content -->

        <div class="container-fluid">
            <div class="row">
                <!-- Left Sidebar start-->
                <div class="side-menu-fixed">
                    <div class="scrollbar side-menu-bg">
                        <ul class="nav navbar-nav side-menu" id="sidebarnav">
                            <!-- menu item Dashboard-->

                            {{-- <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                                    <div class="pull-left">
                                        <i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                                    </div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="index.html">Dashboard 01</a></li>
                                    <li><a href="index-02.html">Dashboard 02</a></li>
                                    <li><a href="index-03.html">Dashboard 03</a></li>
                                    <li><a href="index-04.html">Dashboard 04</a></li>
                                    <li><a href="index-05.html">Dashboard 05</a></li>
                                </ul>
                            </li> --}}


                            @if (auth()->user()->hasPermission('read_users'))
                                <li>
                                    <a href="{{ route('dashboard.users.index') }}">
                                        <div class="pull-left">
                                            <i class="ti-layout-tab-window"></i><span
                                                class="right-nav-text">{{ __('site.users') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermission('read_invoices'))
                                <li>
                                    <a href="{{ route('dashboard.invoices.index') }}">
                                        <div class="pull-left">
                                            <i class="ti-layout-tab-window"></i><span
                                                class="right-nav-text">{{ __('site.invoices') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermission('read_products'))
                                <li>
                                    <a href="{{ route('dashboard.products.index') }}">
                                        <div class="pull-left">
                                            <i class="ti-layout-tab-window"></i><span
                                                class="right-nav-text">{{ __('site.products') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermission('read_categories'))
                                <li>
                                    <a href="{{ route('dashboard.categories.index') }}">
                                        <div class="pull-left">
                                            <i class="ti-layout-tab-window"></i><span
                                                class="right-nav-text">{{ __('site.categories') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->hasPermission('read_sizes'))
                                <li>
                                    <a href="{{ route('dashboard.sizes.index') }}">
                                        <div class="pull-left">
                                            <i class="ti-layout-tab-window"></i><span
                                                class="right-nav-text">{{ __('site.sizes') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                                    <div class="pull-left">
                                        <i class="ti-home"></i><span
                                            class="right-nav-text">{{ __('site.languages') }}</span>
                                    </div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Left Sidebar End-->

                <!--=================================
wrapper -->

                <div class="content-wrapper">
                    @yield('header')


                    <!-- Orders Status widgets-->
                    <div class=" h-auto w-100 pb-4">
                        @yield('content')
                    </div>
                    <!--=================================
 footer -->

                    <footer class="bg-white p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center text-md-left">
                                    <p class="mb-0">
                                        &copy; Copyright
                                        <span id="copyright">
                                            <script>
                                                document
                                                    .getElementById("copyright")
                                                    .appendChild(
                                                        document.createTextNode(new Date().getFullYear())
                                                    );
                                            </script>
                                        </span>. <a href="#"> Webmin </a> All Rights
                                        Reserved.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="text-center text-md-right">
                                    <li class="list-inline-item">
                                        <a href="#">Terms & Conditions </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">API Use Policy </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Privacy Policy </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- main content wrapper end-->
            </div>
        </div>
    </div>

    <!--=================================
 footer -->

    <!--=================================
 jquery -->

    <!-- jquery -->

    <!-- plugins-jquery -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = "{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/') }}";
    </script>

    <!-- chart -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/chart-init.js') }}"></script>

    <!-- calendar -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/calendar.init.js') }}"></script>

    <!-- charts sparkline -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/sparkline.init.js') }}"></script>

    <!-- charts morris -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/morris.init.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/datepicker.js') }}"></script>

    <!-- sweetalert2 -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/sweetalert2.js') }}"></script>

    <!-- toastr -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/toastr.js') }}"></script>

    <!-- validation -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/validation.js') }}"></script>

    <!-- lobilist -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/lobilist.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset(LaravelLocalization::getCurrentLocaleDirection() . '/js/custom.js') }}"></script>
    @livewireScripts
    <script>
        $('.image').change(function() {
            if (this.files && this.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(this.files[0])
            }
        })
    </script>
</body>

</html>
