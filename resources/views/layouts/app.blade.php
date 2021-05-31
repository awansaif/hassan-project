<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/css/jquery.dataTables.css') }}">

    @guest
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endguest
</head>

<body>
    @include('partial.loader')
    @Auth
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="{{ Route('home') }}">
                            <img class="img-fluid" src="{{ asset('assets/images/logo.png')}}" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="{{ asset('assets/images/avatar-4.jpg')}}" class="img-radius"
                                        alt="User-Profile-Image">
                                    <span>{{ Auth::guard('admin')->user()->name }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            <i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle">
                            <a href="#">
                                <i class="icon-close icons"></i>
                            </a>
                        </div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Team</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="/team-members">
                                        <span><i class="ti-user"></i></span>
                                        Members
                                    </a>
                                </li>
                                <div class="pcoded-navigatio-lavel">Layout</div>
                                <li class="">
                                    <a href="{{ Route('home') }}">
                                        <span><i class="ti-home"></i></span>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="/registered">
                                        <span><i class="ti-user"></i></span>
                                        Registered Users
                                    </a>
                                </li>
                                <li>
                                    <a href="/flash-news">
                                        <span><i class="ti-pencil"></i></span>
                                        Flash News
                                    </a>
                                </li>

                                {{-- links  --}}
                                <div class="pcoded-navigatio-lavel">Links & Orders</div>
                                <li>
                                    <a href="{{ Route('links.index') }}" class="nav nav-item">
                                        <span><i class="ti-link"></i></span>
                                        Links
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('linkOrder') }}" class="nav nav-item">
                                        <span><i class="ti-shopping-cart"></i></span>
                                        Orders
                                    </a>
                                </li>

                                {{-- Products  --}}
                                <div class="pcoded-navigatio-lavel">Products & Orders</div>
                                <li>
                                    <a href="{{ Route('shops.index') }}" class="nav nav-item">
                                        <span><i class="ti-shopping-cart"></i></span>
                                        Shops
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('products.index') }}" class="nav nav-item">
                                        <span><i class="ti-truck"></i></span>
                                        Products
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('product-orders') }}" class="nav nav-item">
                                        <span><i class="ti-shopping-cart"></i></span>
                                        Orders
                                    </a>
                                </li>

                                <div class="pcoded-navigatio-lavel">Events & Orders</div>
                                <li>
                                    <a href="{{ Route('event.index') }}" class="nav nav-item">
                                        <span>
                                            <i class="ti-ticket"></i>
                                        </span>
                                        Events
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('event-orders') }}" class="nav nav-item">
                                        <span>
                                            <i class="ti-ticket"></i>
                                        </span>
                                        Event Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('federation-event') }}" class="nav nav-item">
                                        <span>
                                            <i class="ti-ticket"></i>
                                        </span>
                                        Federaion Events
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('federation-event-orders') }}" class="nav nav-item">
                                        <span>
                                            <i class="ti-ticket"></i>
                                        </span>
                                        Federation Event Orders
                                    </a>
                                </li>
                                <div class="pcoded-navigatio-lavel">Tesseramento
                                </div>
                                <li>
                                    <a href="{{ url('membership') }}" class="nav nav-item">
                                        <span><i class="ti-angle-right"></i></span>
                                        Tesseramento
                                    </a>
                                </li>


                                <div class="pcoded-navigatio-lavel">Live</div>
                                <li>
                                    <a href="{{ url('scores') }}" class="nav nav-item">
                                        <span><i class="ti-game"></i></span>
                                        Scores
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('streams.index') }}" class="nav nav-item">
                                        <span>
                                            <i class="ti-music"></i>
                                        </span>
                                        Stream
                                    </a>
                                </li>


                                <div class="pcoded-navigatio-lavel">Countires</div>
                                <li>
                                    <a href="{{ Route('countries.index') }}" class="nav nav-item">
                                        <span><i class="ti-world"></i></span>
                                        Countires
                                    </a>
                                </li>


                                <div class="pcoded-navigatio-lavel">Videos</div>
                                <li>
                                    <a href="{{ url('video-list') }}" class="nav nav-item">
                                        <span>
                                            <i class="ti-video-camera"></i>
                                        </span>
                                        Videos
                                    </a>
                                </li>


                                <div class="pcoded-navigatio-lavel">Countires</div>
                                <li>
                                    <a href="{{ url('countries') }}" class="nav nav-item">
                                        <span><i class="ti-world"></i></span>
                                        Countires
                                    </a>
                                </li>


                                <div class="pcoded-navigatio-lavel">Gallery</div>
                                <li>
                                    <a href="{{ url('collections') }}">
                                        <span>
                                            <i class="ti-gallery"></i>
                                        </span>
                                        Collection
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('collection-images') }}">
                                        <span>
                                            <i class="ti-image"></i>
                                        </span>
                                        Collection Images
                                    </a>
                                </li>


                                <div class="pcoded-navigatio-lavel">Sponsors & Players</div>
                                <li>
                                    <a href="{{ Route('mainclub.index') }}">
                                        <span>
                                            <i class="ti-cloud"></i>
                                        </span>
                                        Clubs
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('sponsor') }}">
                                        <span>
                                            <i class="ti-gift"></i>
                                        </span>
                                        Sponsors
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('player.index') }}">
                                        <span>
                                            <i class="ti-game"></i>
                                        </span>
                                        Player
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ Route('federations.index') }}">
                                        <span>
                                            <i class="ti-layout-grid2-alt"></i>
                                        </span>
                                        Player Federation
                                    </a>
                                    {{-- /  --}}
                                </li>

                                <div class="pcoded-navigatio-lavel">News</div>
                                <li>
                                    <a href="/news">
                                        <span>
                                            <i class="ti-wordpress"></i>
                                        </span>
                                        News
                                    </a>
                                </li>

                                <div class="pcoded-navigatio-lavel">Federations</div>

                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span><i class="ti-angle-right"></i></span>
                                        <span>Federation Movement</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="/federation-movement">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Movements</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span><i class="ti-angle-right"></i></span>
                                        <span>Federation News</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="/federation-news">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Federations News</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="/add-federation-news">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add
                                                    Federation News</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span><i class="ti-angle-right"></i></span>
                                        <span>Federation Sponsor</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="/federation-sponsor">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Federations Sponsor</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="/add-federation-sponsor">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add
                                                    Federation Sponsor</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span><i class="ti-angle-right"></i></span>
                                        <span>Federation Albodoro</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{route('albodro-category.index')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Albodoro
                                                    Categories</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('albodro-category.create')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add
                                                    Albodoro Category</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('albodro-items.create')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add
                                                    Albodoro Items</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span><i class="ti-angle-right"></i></span>
                                        <span>Federation Cassifiche</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="/federation-cassifiche">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Federation
                                                    Cassifiche</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="/add-federation-cassifiche">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add
                                                    Federation Cassifiche</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- Just for the spacing in bottom --}}
                                <br><br><br>
                            </ul>
                        </div>
                    </nav>
                    @endauth

                    <div id="main">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>

    <script type="text/javascript" src="{{ asset('datatable/js/jquery.dataTables.js') }}">
    </script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo-12.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>
    @yield('scripts')
</body>

</html>
