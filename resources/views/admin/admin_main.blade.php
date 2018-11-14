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
            <th scope="col">Company Name</th>
            <th scope="col">Edit/View details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <th scope="row">1</th>
                <td>{{ $client['users']->image }}</td>
                <td>{{ $client['users']->name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client['users']->email }}</td>
                <td>{{ $client->company_name }}</td>
                <td><a href="{{ route('client_edit',['id'=>$client->id]) }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection