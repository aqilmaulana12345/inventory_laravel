@extends('layouts.app')

@section('content')
<h3>Transactions</h3>
<a href="{{ route('transactions.create') }}" class="btn btn-success mb-3">Add Transaction</a>

<table id="transactions-table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>User</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $t)
        <tr>
            <td>{{ $t->product->name }}</td>
            <td>{{ $t->user->name }}</td>
            <td>{{ ucfirst($t->type) }}</td>
            <td>{{ $t->quantity }}</td>
            <td>{{ $t->created_at->format('d-m-Y H:i') }}</td>
            <td class="d-flex gap-1">
                <!-- Tombol Edit -->
                <a href="{{ route('transactions.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <!-- Tombol Delete -->
                <form action="{{ route('transactions.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Laravel -->
<div class="mt-3">
    {{ $transactions->links() }}
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#transactions-table').DataTable({
        "paging": false,     // Matikan paging DataTable karena pakai Laravel pagination
        "info": false,
        "searching": true,
        "columnDefs": [
            { "orderable": false, "targets": 5 } // Nonaktifkan sorting untuk kolom Actions
        ]
    });
});
</script>
@endpush
