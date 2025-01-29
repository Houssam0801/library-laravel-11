@extends('layout')

@section('title', 'Modifier categorie')

@section('content')
<div class="container">
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomcategorie">Category Name</label>
            <input type="text" name="nomcategorie" id="nomcategorie" class="form-control" value="{{ old('nomcategorie', $category->nomcategorie) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a class="btn btn-secondary" href="{{ route('categories.index') }}">Cancel</a>
    </form>
</div>
@endsection
