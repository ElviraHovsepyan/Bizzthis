@extends('layouts.admin_layout')
@section('content')
    <h1>Clients</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pic</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Edit/View details</th>
            <th scope="col">Company Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $i=>$client)
            <tr>
                <th scope="row">{{ $i+1 }}</th>
                <td><img src="/images/user_images/{{ $client['users']->image }}"></td>
                <td>{{ $client['users']->name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client['users']->email }}</td>
                <td><a href="{{ route('client_edit',['id'=>$client->id]) }}"><img src="/images/company_images/{{ $client->logo }}"></a></td>
                <td>{{ $client->company_name }} &nbsp &nbsp <button class="add_price_button" data-id="{{ $client['users']->id }}" data-toggle="modal" data-target=".add-category">Add price</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>

{{------------------price modal------------------}}

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