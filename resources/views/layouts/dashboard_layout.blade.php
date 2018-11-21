<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BizzThis</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/entypo-font.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/hover.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/my_style.css')}}"/>
</head>
<body>
<header class="open-block pl-3 pr-3 font-normal expand-active">
    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-0 text-uppercase font-normal">Hello <span class="text-bold fs-26">{{ Auth::user()->name }}</span></h3>
            <p class="fs-14 mb-0">last time you logged in {{ Auth::user()->last_login }}</p>
        </div>
        <div class="col-md-6">
            <ul class="w-100 list-unstyled d-flex justify-content-end align-items-center flex-wrap">
                <li class="w-sm-100">
                    <ul class="list-unstyled d-flex justify-content-end align-items-center notification">
                        <li class="mr-5">
                            <a class="position-relative" href="#">
                                <span class="fs-22 fa fa-bell-o"></span>
                                <span class="position-absolute blue-circle">8</span>
                            </a>
                        </li>
                        <li>
                            <a class="position-relative" href="#">
                                <span class="fs-22 fa fa-envelope-o"></span>
                                <span class="position-absolute blue-circle">5</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="w-sm-50 mr-4">
                    <div class="dropdown">
                        <button type="button" class="btn border-0 dropdown-toggle entypo-down-open position-relative bg-transparent pr-4 fs-18" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item fs-18 font-normal" href="#">Link 1</a>
                            <a class="dropdown-item fs-18 font-normal" href="#">Link 2</a>
                            <a class="dropdown-item fs-18 font-normal" href="{{ route('logout') }}">Log Out</a>
                        </div>
                    </div>
                </li>
                <li class="user-img">
                    <img src="/images/user_images/{{ Auth::user()->image }}" alt="user img">
                </li>
            </ul>
        </div>
    </div>
</header>
<main class="open-block dashboard-main font-normal">
    <div class="menu expand-active">
        <h2>
            <a class="logo d-none trans" href="{{ route('mainView') }}">BizzThis</a>
        </h2>
        <div class="menu-toggle close-menu">
            <span class="entypo-left-open-big pointer"></span>
        </div>
        <div class="d-inline-block open-block">
            <span class="entypo-right-open-big pointer"></span>
        </div>
        <ul class="list-unstyled menu-list pt-3 pb-4">
            <li class="mb-3 dashboard">
                <a href="{{ route('dashboardView') }}" class="trans d-flex justify-content-start text-white align-items-center position-relative" >
                    <span class="menu-icon entypo-gauge fs-26"></span>
                    <span class="text ml-2 font-normal text-uppercase">HOME/Dashboard</span>
                </a>
            </li>
            <li class="mb-3 insights">
                <a href="{{ route('dashboardInsights') }}" class="trans d-flex justify-content-start align-items-center position-relative text-white">
                    <span class="menu-icon fa fa-bar-chart fs-26"></span>
                    <span class="text ml-2 font-normal text-uppercase">insights
                         <span class="entypo-right-open-big fs-18"></span>
                    </span>
                </a>
            </li>
            <li class="mb-3 prices">
                <a  href="{{ route('dashboardPrices') }}" class="trans d-flex justify-content-start align-items-center position-relative text-white">
                    <span class="menu-icon entypo-tag fs-26"></span>
                    <span class="text ml-2 font-normal text-uppercase">set your prices
                         <span class="entypo-right-open-big fs-18"></span>
                    </span>
                </a>
            </li>
            <li class="mb-3 profile">
                <a href="{{ route('dashboardProfile') }}" class="trans d-flex justify-content-start align-items-center position-relative text-white">
                    <span class="menu-icon entypo-users fs-26"></span>
                    <span class="text ml-2 font-normal text-uppercase">Company profile
                         <span class="entypo-right-open-big fs-18"></span>
                    </span>
                </a>
            </li>
            <li class="mb-3 invoices">
                <a href="{{ route('dashboardInvoices') }}" class="trans d-flex justify-content-start align-items-center position-relative text-white">
                    <span class="menu-icon entypo-newspaper fs-26"></span>
                    <span class="text ml-2 font-normal text-uppercase">invoices
                         <span class="entypo-right-open-big fs-18"></span>
                    </span>
                </a>
            </li>
            <li class="mb-3 settings">
                <a href="{{ route('dashboardSettings') }}" class="trans d-flex justify-content-start align-items-center position-relative text-white">
                    <span class="menu-icon fa fa-cog fs-26"></span>
                    <span class="text ml-2 font-normal text-uppercase">settings
                         <span class="entypo-right-open-big fs-18"></span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <hr/>
@yield('content')

<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.form-validator.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="{{asset('js/client.js')}}"></script>

</body>
</html>
