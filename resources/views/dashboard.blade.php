@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Dashboard</h1>
        <a href="{{ asset('clients/add') }}" class="btn btn-primary">+ Create Client</a>
    </div>
    <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>

    @if(count($clients) > 0)
        <h2>Clients</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Company Logo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td>{{ $client->address }}</td>
                    <td>
                        @if($client->company_logo)
                            <img src="{{ asset('storage/images' . $client->company_logo) }}" alt="{{ $client->name }} company_logo">
                        @else
                            No Logo
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No clients available.</p>
    @endif
@endsection
