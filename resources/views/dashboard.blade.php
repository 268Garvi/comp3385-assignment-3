@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Dashboard</h1>
        <a href="{{ asset('clients/add') }}" class="btn btn-primary">+ Create Client</a>
    </div>
    <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients, and much more.</p>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($clients as $client)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/images/'. $client->company_logo) }}" alt="{{ $client->name }} company logo" class="card-img-top"> <!-- Added class for image -->
                    <div class="card-body">
                        <h5 class="card-title" style="color: #0d6dfb">{{ $client->name }}</h5>
                        <p class="card-text">{{ $client->email }}</p>
                        <p class="card-text">{{ $client->telephone }}</p>
                        <p class="card-text">{{ $client->address }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
