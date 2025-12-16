@extends('layouts.app')

@section('content')
<a href="{{ route('categories.create') }}" class="btn btn-success mb-2">Add Category</a>

<table id="categories-table" class="table table-bordered">
<thead>
<tr>
<th>Name</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($categories as $c)
<tr>
<td>{{ $c->name }}</td>
<td>
<a href="{{ route('categories.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>

<form action="{{ route('categories.destroy', $c->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>

{{ $categories->links() }}
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#categories-table').DataTable();
});
</script>
@endpush
