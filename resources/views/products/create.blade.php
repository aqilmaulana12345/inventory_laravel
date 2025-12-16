@extends('layouts.app')

@section('content')
<h3>Add Product</h3>

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id')==$category->id?'selected':'' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01" min="0.01" required>
        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Initial Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" min="0" required>
        @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
