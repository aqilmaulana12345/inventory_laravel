@extends('layouts.app')

@section('content')
<h3>Edit Category</h3>

<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
