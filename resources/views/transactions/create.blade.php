@extends('layouts.app')

@section('content')
<h3>Add Transaction</h3>

<form method="POST" action="{{ route('transactions.store') }}">
    @csrf

    <div class="mb-3">
        <label>Product</label>
        <select name="product_id" class="form-select" required>
            @foreach($products as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-select" required>
            <option value="purchase">Purchase</option>
            <option value="sale">Sale</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" min="1" required>
    </div>

    <div class="mb-3">
        <label>Discount (optional)</label>
        <input type="number" name="discount" class="form-control" min="0" value="0">
    </div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
