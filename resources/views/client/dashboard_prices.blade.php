@extends('layouts.dashboard_layout')
@section('content')
    <div class="bg-white p-3 mb-3">
        <div class="d-flex align-items-center justify-content-start pl-2 mb-4">
            <h4 class="mb-0 mr-5">Category & Prices</h4>
            <a class="d-flex align-items-center" onclick="javascript:void(0)" data-toggle="modal" href="#" data-target=".add-category">
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
            @foreach($prices as $price)
                <tr>
                    <td data-label="Category">
                        <p class="category bg-light-blue text-bold fs-14 mb-0">{{ $price['categories']->name }}</p>
                    </td>
                    <td data-label="Hourly Price">
                        <p class="mb-0 border price d-inline-block text-center p-1 fs-14 text-bold">{{ $price->price }} kr</p>
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
            @endforeach
            </tbody>
        </table>
    </div>
    </main>

    <div class="modal fade add-category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="dimensions_row">
                        <div id="dimension_1" class="col-md-2 col-md-offset-1">
                            <div class="categories_row position-relative">
                                <ul class="list-group"></ul>
                            </div>
                        </div>
                        <div id="dimension_2" class="col-md-2">
                            <div class="categories_row">
                                <ul class="list-group"></ul>
                            </div>
                        </div>
                        <div id="dimension_3" class="col-md-2">
                            <div class="categories_row">
                                <ul class="list-group"></ul>
                            </div>
                        </div>
                        <div id="dimension_4" class="col-md-2">
                            <div class="categories_row">
                                <ul class="list-group"></ul>
                            </div>
                        </div>
                        <div id="dimension_5" class="col-md-2">
                            <div class="categories_row">
                                <ul class="list-group"></ul>
                            </div>
                        </div>
                        <div class="col-md-1 hidden" id="price_input">
                            <form action="#">
                                <label for="price">Set price</label>
                                <input type="text" id="price" autofocus>
                            </form>
                            <p class="notification fs-12"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_button">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection