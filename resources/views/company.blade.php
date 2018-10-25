@extends('layouts.main_layout')
@section('header')
    <header class="d-flex align-items-center">
        <div class="container-fluid wrapper h-100">
            <div class="row">
                <div class="col-xl-5 d-flex align-items-center justify-content-between flex-wrap">
                    <h1 class="mb-lg-0">
                        <a class="d-block logo" href="#"></a>
                    </h1>
                    <a href="#" class="orange-line pb-1">Sok timpriser</a>
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
                <div class="col-xl-5">
                    <form action="#">
                        <div class="row no-gutters">
                            <div class="col-md-3 form-group mb-2 mt-2">
                                <select class="form-control br-0">
                                    <option value="audi" selected>Alla kategorier</option>
                                    <option value="text">text</option>
                                    <option value="text">text</option>
                                    <option value="text">text</option>
                                </select>
                            </div>
                            <div class="col-md-9 form-group mb-2 mt-2">
                                <input type="search" class="form-control br-0 font-normal pl-5" placeholder="Sok efter en tjanst...">
                                <span class="entypo-search text-orange"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-2 d-flex align-items-center">
                    <ul class="w-100 list-unstyled d-flex justify-content-between align-items-center">
                        <li class="mt-2 mb-2">
                            <a href="#">Om oss</a>
                        </li>
                        <li class="mt-2 mb-2">
                            <a href="#">Kontakta oss</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('search_details')
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-md-6 pt-5">
                <h4 class="text-black mb-3">Avstand</h4>
                <ul class="list-unstyled d-flex align-items-center justify-content-between flex-wrap list text-gray">
                    <li class="p-2 trans">0-10km</li>
                    <li class="p-2 trans">10-50km</li>
                    <li class="p-2 trans">50-100km</li>
                    <li class="p-2 trans">100+km</li>
                </ul>
            </div>
            <div class="col-xl-5 col-md-6 pt-5">
                <h4 class="text-black mb-3">Pris</h4>
                <ul class="list-unstyled d-flex align-items-center justify-content-between flex-wrap list text-gray">
                    <li class="p-2 trans">0-200kr</li>
                    <li class="p-2 trans">200-400kr</li>
                    <li class="p-2 trans">400-600km</li>
                    <li class="p-2 trans">600+km</li>
                </ul>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table mt-5 font-normal">
                <thead>
                <tr>
                    <th class="pl-0">Foretag</th>
                    <th>Tjanst</th>
                    <th>Pris</th>
                    <th>
                        <div class="form-group mb-0 entypo-down-open position-relative">
                            <select class="form-control border-0">
                                <option value="audi" selected>Avstand</option>
                                <option value="text">text</option>
                                <option value="text">text</option>
                                <option value="text">text</option>
                            </select>
                        </div>
                    </th>
                    <th>Omdomen</th>
                    <th>Lankar</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="pl-0">
                        <img src="images/home/logo-1.png" alt="logo">
                    </td>
                    <td>
                        <ul class="font-normal list-unstyled font-bold">
                            <li>Malare</li>
                            <li>Elektriker</li>
                            <li>Snickare</li>
                            <li>Rormokare</li>
                        </ul>
                    </td>
                    <td>
                        <ul class=" font-normal list-unstyled font-bold">
                            <li>105 kr/tim</li>
                            <li>199 kr/tim</li>
                            <li>99 kr/tim</li>
                            <li>199kr/tim</li>
                        </ul>
                    </td>
                    <td>
                        <3km
                    </td>
                    <td>
                        <ul class="list-unstyled chat-block">
                            <li class="d-flex align-items-center justify-content-start mb-2">
                                <img src="images/home/Chat%20Bubble_100px.png" alt="Chat">
                                <span class="pl-2">103</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-start mb-2">
                                <img src="images/home/Star_100px.png" alt="Star">
                                <span class="pl-2">4.7</span>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <button class="btn btn-orange text-white br-3">Klicka for kontaktinfo</button>
                    </td>
                </tr>
                <tr>
                    <td class="pl-0">
                        <img src="images/home/logo-3.png" alt="logo">
                    </td>
                    <td>
                        <ul class="font-normal list-unstyled font-bold">
                            <li>Malare</li>
                        </ul>
                    </td>
                    <td>
                        <ul class="font-normal list-unstyled font-bold">
                            <li>121 kr/tim</li>
                        </ul>
                    </td>
                    <td>
                        <5km
                    </td>
                    <td>
                        <ul class="font-normallist-unstyled chat-block">
                            <li class="d-flex align-items-center justify-content-start mb-2">
                                <img src="images/home/Chat%20Bubble_100px.png" alt="Chat">
                                <span class="pl-2">35</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-start mb-2">
                                <img src="images/home/Star_100px.png" alt="Star">
                                <span class="pl-2">3.9</span>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <button class="btn btn-orange text-white br-3">Klicka for kontaktinfo</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
