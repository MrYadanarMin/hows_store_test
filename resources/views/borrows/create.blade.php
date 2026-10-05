@extends('Layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">New Borrow / Return Transaction</h4>
                <a href="{{ route('borrows.index') }}" class="btn btn-sm btn-light">Back to List</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('borrows.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="partner_id" class="form-label">Partner Catering</label>
                            <select name="partner_id" id="partner_id" class="form-select" required>
                                <option value="">-- Select Partner --</option>
                                @foreach($partners as $partner)
                                    <option value="{{ $partner->id }}" {{ old('partner_id') == $partner->id ? 'selected' : '' }}>
                                        {{ $partner->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="type" class="form-label">Transaction Type</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="lent_out" {{ old('type') == 'lent_out' ? 'selected' : '' }}>Lent Out (Given to Partner)</option>
                                <option value="borrowed_in" {{ old('type') == 'borrowed_in' ? 'selected' : '' }}>Borrowed In (Taken from Partner)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="borrow_date" class="form-label">Borrow Date</label>
                            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ old('borrow_date', date('Y-m-d')) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="return_date" class="form-label">Expected Return Date</label>
                            <input type="date" name="return_date" id="return_date" class="form-control" value="{{ old('return_date') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Note / Description</label>
                        <textarea name="note" id="note" class="form-control" rows="2" placeholder="Optional notes...">{{ old('note') }}</textarea>
                    </div>

                    <hr class="my-4">

                    <h5 class="mb-3">Select Items</h5>
                    <div id="item-rows">
                        <div class="row mb-2 item-row">
                            <div class="col-md-7">
                                <select name="items[0][item_id]" class="form-select" required>
                                    <option value="">-- Select Item --</option>
                                    @foreach($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="items[0][quantity]" class="form-control" placeholder="Qty" min="1" value="1" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-row-btn w-100" disabled>Remove</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-item-btn" class="btn btn-outline-secondary btn-sm mb-4">
                        <i class="bi bi-plus-circle"></i> Add Another Item
                    </button>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Save Transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let itemIndex = 1;
    const itemContainer = document.getElementById('item-rows');
    const addButton = document.getElementById('add-item-btn');

    addButton.addEventListener('click', function () {
        const firstRow = itemContainer.querySelector('.item-row');
        const newRow = firstRow.cloneNode(true);

        // Update input/select names with new index
        newRow.querySelector('select').name = `items[${itemIndex}][item_id]`;
        newRow.querySelector('select').value = '';
        newRow.querySelector('input').name = `items[${itemIndex}][quantity]`;
        newRow.querySelector('input').value = '1';

        // Enable remove button
        const removeBtn = newRow.querySelector('.remove-row-btn');
        removeBtn.disabled = false;
        removeBtn.addEventListener('click', function () {
            newRow.remove();
        });

        itemContainer.appendChild(newRow);
        itemIndex++;
    });
});
</script>
@endsection
@endsection
