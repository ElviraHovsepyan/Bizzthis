@extends('layouts.dashboard_layout')
@section('content')
    <div class="bg-white p-3 text-center mb-3">
        <canvas id="popChart" width="600" height="500"></canvas>
    </div>
    <div class="row">
        <div class="col-xl-4 mb-4">
            <div class="bg-white p-3 h-100">
                <h4 class="mb-4">News & Announcements</h4>
                <ul class="list-unstyled">
                    <li class="d-table position-relative mb-2">
                        <div class="news-img pr-3 d-table-cell">
                            <img src="../images/dashboard/like.png" alt="like">
                        </div>
                        <div class="news-text d-table-cell">
                            <h6 class="fs-18 mb-0">Update 3.2 <span class="text-uppercase text-white bg-green fs-14 text-bold">New</span></h6>
                            <p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit...
                                <a class="text-bold fs-12 pull-right" href="#">Read more</a>
                            </p>
                        </div>
                    </li>
                    <li class="d-table position-relative mb-2">
                        <div class="news-img pr-3 d-table-cell">
                            <img src="../images/dashboard/calendar.png" alt="like">
                        </div>
                        <div class="news-text d-table-cell">
                            <h6 class="fs-18 mb-0">Update 3.1</h6>
                            <p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit...
                                <a class="text-bold fs-12 pull-right" href="#">Read more</a>
                            </p>
                        </div>
                    </li>
                    <li class="d-table position-relative mb-3">
                        <div class="news-img pr-3 d-table-cell">
                            <img src="../images/dashboard/compass.png" alt="like">
                        </div>
                        <div class="news-text d-table-cell">
                            <h6 class="fs-18 mb-0">Update 3.0 </h6>
                            <p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit...
                                <a class="text-bold fs-12 pull-right" href="#">Read more</a>
                            </p>
                        </div>
                    </li>
                    <li class="d-table position-relative mb-2">
                        <div class="news-img pr-3 d-table-cell">
                            <img src="../images/dashboard/update.png" alt="like">
                        </div>
                        <div class="news-text d-table-cell">
                            <h6 class="fs-18 mb-0">Update 3.0 </h6>
                            <p class="mb-0 fs-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit...
                                <a class="text-bold fs-12 pull-right" href="#">Read more</a>
                            </p>
                        </div>
                    </li>
                    <li class="text-right">
                        <a class="text-black text-bold" href="#">View all</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xl-8 mb-4">
            <div class="bg-white p-3 h-100">
                <h4 class="mb-4">Category & Prices</h4>
                <table class="table border-0 data-table">
                    <thead>
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Hourly Price</th>
                        <th scope="col">Price Range</th>
                        <th scope="col">Price Rank <span class="fs-12 text-light-gray font-weight-normal">[Region/Country]</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-label="Category">
                            <p class="category bg-violet text-white fs-14 mb-0">Cleaning</p>
                        </td>
                        <td data-label="Hourly Price">
                            <p class="mb-0 border price d-inline-block text-center p-1 fs-14 text-bold">129 kr</p>
                        </td>
                        <td data-label="Price Range">
                            <ul class="list-unstyled d-flex align-items-center justify-content-lg-between justify-content-sm-end text-light-gray fs-14">
                                <li>Low</li>
                                <li class="position-relative pr-range ml-2 mr-2">
                                    <input class="priceInputRange" type="range" min="0" max="249" step="1">
                                </li>
                                <li>High</li>
                            </ul>
                        </td>
                        <td data-label="Price Rank">
                            <p class="priceInputValue mb-0 rank fs-14 text-bold pl-3"><span>125</span>/249</p>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Category">
                            <p class="category bg-dark-green text-white fs-14 mb-0">Moving</p>
                        </td>
                        <td data-label="Hourly Price">
                            <p class="mb-0 border price d-inline-block text-center p-1 fs-14 text-bold">129 kr</p>
                        </td>
                        <td data-label="Price Range">
                            <ul class="list-unstyled d-flex align-items-center justify-content-lg-between justify-content-sm-end text-light-gray fs-14">
                                <li>Low</li>
                                <li class="position-relative pr-range ml-2 mr-2">
                                    <input class="priceInputRange" type="range" min="0" max="99" step="1">
                                </li>
                                <li>High</li>
                            </ul>
                        </td>
                        <td data-label="Price Rank">
                            <p class="priceInputValue mb-0 rank fs-14 text-bold pl-3"><span>50</span>/99</p>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Category">
                            <p class="category text-white fs-14 mb-0 bg-pink">Furniture Setup</p>
                        </td>
                        <td data-label="Hourly Price">
                            <p class="mb-0 border price d-inline-block text-center p-1 fs-14 text-bold">129 kr</p>
                        </td>
                        <td data-label="Price Range">
                            <ul class="list-unstyled d-flex align-items-center justify-content-lg-between justify-content-sm-end text-light-gray fs-14">
                                <li>Low</li>
                                <li class="position-relative pr-range ml-2 mr-2">
                                    <input class="priceInputRange" type="range" min="0" max="349" step="1">
                                </li>
                                <li>High</li>
                            </ul>
                        </td>
                        <td data-label="Price Rank">
                            <p class="priceInputValue mb-0 rank fs-14 text-bold pl-3"><span>175</span>/349</p>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Category">
                            <p class="category bg-brown text-white fs-14 mb-0">Removal</p>
                        </td>
                        <td data-label="Hourly Price">
                            <p class="mb-0 border price d-inline-block text-center p-1 fs-14 text-bold">129 kr</p>
                        </td>
                        <td data-label="Price Range">
                            <ul class="list-unstyled d-flex align-items-center justify-content-lg-between justify-content-sm-end text-light-gray fs-14">
                                <li>Low</li>
                                <li class="position-relative pr-range ml-2 mr-2">
                                    <input class="priceInputRange" type="range" min="0" max="199" step="1">
                                </li>
                                <li>High</li>
                            </ul>
                        </td>
                        <td data-label="Price Rank">
                            <p class="priceInputValue mb-0 rank fs-14 text-bold pl-3"><span>100</span>/199</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="d-flex align-items-center justify-content-between pl-2">
                    <a class="d-flex align-items-center" href="#">
                        <span class="circle entypo-plus fs-18 mr-2"></span>
                        Add new categories
                    </a>
                    <a class="text-black text-bold" href="#">View all</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 mb-4">
            <div class="bg-white h-100 p-3 mb-3">
                <h4>Chat with us</h4>
                <p class="mb-4">We're here to help! Start a chat session and ask us anything.</p>
                <div class="form-row">
                    <div class="col-sm-4">
                        <div class="user-img position-relative" style="background-image: url('../images/dashboard/man.png')">
                            <div class="is-online position-absolute"></div>
                        </div>
                    </div>
                    <div class="col-sm-8 text-center">
                        <h5 class="mb-3 text-bold">Opening hours</h5>
                        <p class="mb-0 text-light-gray">Mon-Fri: 09:00 to 17:00</p>
                        <p class="mb-3 text-light-gray">Sat-Sun: 09:00 to 15:00</p>
                        <p class="text-green">Avg Wait time: 2 min</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 mb-4">
            <div class="bg-white h-100 p-3 mb-3">
                <h4>How to use our sistem</h4>
                <p class="mb-4">Look through our guides to learn more about our system</p>
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="pl-xl-3 pr-xl-3">
                            <div>
                                <img src="../images/dashboard/img1.png" alt="">
                            </div>
                            <a href="#" class="d-inline-block mt-2 text-bold fs-18">Getting started</a>
                            <p class="mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, corporis ipsum provident. </p>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="pl-xl-3 pr-xl-3">
                            <div>
                                <img src="../images/dashboard/img2.png" alt="">
                            </div>
                            <a href="#" class="d-inline-block mt-2 text-bold fs-18">Learn Dashboard</a>
                            <p class="mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, corporis ipsum provident. </p>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <div class="pl-xl-3 pr-xl-3">
                            <div>
                                <img src="../images/dashboard/img3.png" alt="">
                            </div>
                            <a href="#" class="d-inline-block mt-2 text-bold fs-18">Bizzthis Development</a>
                            <p class="mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, corporis ipsum provident. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white p-3 mb-3">
        <h4>Invoices</h4>
        <p class="mb-4">See all your invoices and their status</p>
        <div class="row">
            <div class="col-xl-11">
                <table class="table border-0 invoice-table text-center data-table">
                    <thead>
                    <tr>
                        <th scope="col">Typ</th>
                        <th scope="col">Fakturanr</th>
                        <th scope="col">Period</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Forfallodatum</th>
                        <th scope="col">Belopp</th>
                        <th scope="col">Status</th>
                        <th scope="col">Pdf</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-label="Typ">Faktura</td>
                        <td data-label="Fakturanr" >775009</td>
                        <td data-label="Period" >2018-05</td>
                        <td data-label="Datum" >2018-05-31</td>
                        <td data-label="Forfallodatum" >2018-05-15</td>
                        <td data-label="Belopp" >2295 kr</td>
                        <td data-label="Status" >Oppen</td>
                        <td data-label="Pdf">
                            <a href="#" download class="pdf d-inline-block">
                                <img src="../images/dashboard/pdf.png" alt="pdf">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td  data-label="Typ">Faktura</td>
                        <td data-label="Fakturanr" >775009</td>
                        <td data-label="Period" >2018-05</td>
                        <td data-label="Datum" >2018-05-31</td>
                        <td data-label="Forfallodatum" >2018-05-15</td>
                        <td data-label="Belopp" >2295 kr</td>
                        <td data-label="Status" >Oppen</td>
                        <td data-label="Pdf">
                            <a href="#" download class="pdf d-inline-block">
                                <img src="../images/dashboard/pdf.png" alt="pdf">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td  data-label="Typ">Faktura</td>
                        <td data-label="Fakturanr" >775009</td>
                        <td data-label="Period" >2018-05</td>
                        <td data-label="Datum" >2018-05-31</td>
                        <td data-label="Forfallodatum" >2018-05-15</td>
                        <td data-label="Belopp" >2295 kr</td>
                        <td data-label="Status" >Oppen</td>
                        <td data-label="Pdf">
                            <a href="#" download class="pdf d-inline-block">
                                <img src="../images/dashboard/pdf.png" alt="pdf">
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xl-1 d-flex align-items-end justify-content-end">
                <a class="text-bold" href="#">Visa alla</a>
            </div>
        </div>

    </div>

    </main>
@endsection