@extends('layouts.app')
@section('content')
<a href="{{ route('products.create') }}" class="btn btn-success mb-2">Add Product</a>

<table id="products-table" class="table table-bordered">
<thead>
<tr>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($products as $p)
<tr>
<td>{{ $p->name }}</td>
<td>{{ $p->category->name }}</td>
<td>{{ $p->price }}</td>
<td>{{ $p->currentStock() }}</td>
<td>
<a href="{{ route('products.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>

{{ $products->links() }}
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#products-table').DataTable();
});
</script>
@endpush
