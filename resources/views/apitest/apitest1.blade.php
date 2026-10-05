@extends('Layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Borrow & Return Transactions</h2>
    <a href="{{ route('apitest.create) }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> New Transaction
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <img src="{{ $response->json()['icon_url'] }}" alt="{{ $response->json()['value'] }}" class="img-fluid">
        <p>{{ $response->json()['value'] }}</p>
    </div>
</div>


@endsection
