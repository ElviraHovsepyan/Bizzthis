@extends('layouts.admin_layout')
@section('content')
    <h1>Prices</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Logo</th>
            <th scope="col">Company</th>
            <th scope="col">Services</th>
            <th scope="col">Prices</th>
            <th scope="col">Edit Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $i=>$company)
            <tr>
                <th scope="row">{{ $i+1 }}</th>
                <td><img src="/images/company_images/{{ $company->logo }}"></td>
                <td>{{ $company->company_name }}</td>
                <td>
                    @foreach($company->users->prices as $price)
                    <p class="category_name_p">{{ $price->categories->name }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach($company->users->prices as $price)
                        <p><input type="text" value="{{ $price->price }}" data-id="{{ $price->id }}" class="price_input"></p>
                    @endforeach
                </td>
                <td>
                    @foreach($company->users->prices as $price)
                        <p><button data-id="{{ $price->id }}" class="edit_price_button"> Edit </button></p>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection