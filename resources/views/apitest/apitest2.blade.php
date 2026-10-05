@extends('Layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Borrow & Return Transactions</h2>
    {{-- <a href="{{ route('borrows.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> New Transaction
    </a> --}}
</div>

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title">Jokes Categories</h5>
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach($response->json() as $category)
                <li class="list-group-item"><a href="{{ route('apitest.apitest1', $category) }}">{{ $category }}</a></li>
            @endforeach
        </ul>
    </div>
</div>


@endsection
