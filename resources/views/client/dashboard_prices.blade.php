@extends('layouts.dashboard_layout')
@section('content')
    <div class="bg-white p-3 mb-3">
        <div class="d-flex align-items-center justify-content-start pl-2 mb-4">
            <h4 class="mb-0 mr-5">Category & Prices</h4>
            <a class="d-flex align-items-center" href="#">
                <span class="circle entypo-plus fs-18 mr-2"></span>
                Add new categories
            </a>
        </div>
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
                        <li class="border-bottom position-relative pr-range ml-2 mr-2">
                            <span class="entypo-record position-absolute" style="left: 4px;"></span>
                        </li>
                        <li>High</li>
                    </ul>
                </td>
                <td data-label="Price Rank">
                    <p class="mb-0 rank fs-14 text-bold pl-3">20/249</p>
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
                        <li class="border-bottom position-relative pr-range ml-2 mr-2">
                            <span class="entypo-record position-absolute" style="left: 10px;"></span>
                        </li>
                        <li>High</li>
                    </ul>
                </td>
                <td data-label="Price Rank">
                    <p class="mb-0 rank fs-14 text-bold pl-3">6/99</p>
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
                        <li class="border-bottom position-relative pr-range ml-2 mr-2">
                            <span class="entypo-record position-absolute" style="left: 14px;"></span>
                        </li>
                        <li>High</li>
                    </ul>
                </td>
                <td data-label="Price Rank">
                    <p class="mb-0 rank fs-14 text-bold pl-3">29/349</p>
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
                        <li class="border-bottom position-relative pr-range ml-2 mr-2">
                            <span class="entypo-record position-absolute" style="left: 20px;"></span>
                        </li>
                        <li>High</li>
                    </ul>
                </td>
                <td data-label="Price Rank">
                    <p class="mb-0 rank fs-14 text-bold pl-3">44/199</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    </main>
@endsection