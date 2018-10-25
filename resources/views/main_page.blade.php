@extends('layouts.main_layout')
@section('header')
    <header class="d-flex align-items-center">
        <div class="container-fluid wrapper h-100">
            <div class="row">
                <div class="col-xl-5 d-flex align-items-center justify-content-between flex-wrap">
                    <h1 class="mb-lg-0">
                        <a class="d-block logo" href="{{ route('mainView') }}"></a>
                    </h1>
                    <a href="#" class="orange-line pb-1">Sok timpriser</a>
                    <a href="#">Foretog</a>
                    <a href="#">Kontakt</a>
                    <div class="d-flex align-items-center w-sm-100">
                        <a class="d-flex align-items-center location-block" href="#">
                            <img class="location-img trans" src="images/home/Tesla%20Supercharger%20Pin_100px.png" alt="Tesla%20Supercharger%20Pin">
                            <span class="ml-2">
                            <span class="font-normal d-inline-block w-100 fs-14"> Sok timpriser</span>
                            <span class="font-bold d-inline-block w-100 fs-18"> Nara dig</span>
                        </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 search-block">
                    <form action="#">
                        <div class="row no-gutters">
                            <div class="col-md-3 form-group mb-2 mt-2">
                                <button class="all-categories form-control text-white pointer" data-toggle="modal" data-target="#allCategory">Alla Kategorier</button>
                            </div>
                            <div class="col-md-9 form-group mb-2 mt-2">
                                <input type="search" class="form-control br-0 font-normal pl-5" placeholder="Sok efter en tjanst...">
                                <span class="entypo-search text-orange"></span>
                            </div>
                        </div>
                    </form>
                </div>
                @if(Auth::user())
                    <div class="col-xl-2 d-flex align-items-center">
                        <ul class="w-100 list-unstyled d-flex justify-content-end align-items-center">
                            <li class="mr-4">
                                <div class="dropdown">
                                    <button type="button" class="btn border-0 dropdown-toggle entypo-down-open position-relative bg-transparent pr-4 fs-18" data-toggle="dropdown">
                                     {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item fs-18 font-normal" href="{{ route('logout') }}">Log Out</a>
                                        <a class="dropdown-item fs-18 font-normal" href="#">Link 2</a>
                                        <a class="dropdown-item fs-18 font-normal" href="#">Link 3</a>
                                    </div>
                                </div>
                            </li>
                            <li class="user-img">
                                <img src="images/home/girl 1.png" alt="user img">
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="col-xl-2 d-flex align-items-center">
                        <ul class="w-100 list-unstyled d-flex justify-content-end align-items-center">
                            <li class="mr-4">
                                <a class="fs-18 text-blue" href="{{ route('loginView') }}">Logga in</a>
                            </li>
                            <li>
                                <a class="fs-18 btn btn-blue text-white no-shadow d-flex align-items-center pl-3 pr-3" href="{{ route('registerView') }}">Skapa konto</a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </header>
@endsection
