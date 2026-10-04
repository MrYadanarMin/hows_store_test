@extends('Layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Borrow & Return Transactions</h2>
    <a href="{{ route('borrows.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> New Transaction
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Partner</th>
                    <th>Type</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->partner->name }}</td>
                        <td>
                            @if($borrow->type === 'lent_out')
                                <span class="badge bg-warning text-dark">Lent Out</span>
                            @else
                                <span class="badge bg-info text-dark">Borrowed In</span>
                            @endif
                        </td>
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date ?? '-' }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ ucfirst(str_replace('_', ' ', $borrow->status)) }}</span>
                        </td>
                        <td>
                            <ul class="mb-0 ps-3">
                                @foreach($borrow->items as $item)
                                    <li>{{ $item->name }} (Qty: {{ $item->pivot->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No transactions recorded yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
