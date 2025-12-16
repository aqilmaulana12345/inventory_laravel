@extends('layouts.app')

@section('content')
<h3>Edit Transaction</h3>

<form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Product</label>
        <input type="text" class="form-control" value="{{ $transaction->product->name }}" disabled>
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-select" required>
            <option value="purchase" {{ $transaction->type=='purchase'?'selected':'' }}>Purchase</option>
            <option value="sale" {{ $transaction->type=='sale'?'selected':'' }}>Sale</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" min="1" value="{{ $transaction->quantity }}" required>
    </div>

    <div class="mb-3">
        <label>Discount (optional)</label>
        <input type="number" name="discount" class="form-control" min="0" value="{{ $transaction->discount }}">
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
