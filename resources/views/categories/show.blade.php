@extends('layout')

@section('title', 'Afficher categorie')

@section('content')
<div class="container">
    <h1>Category Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID: {{ $category->id }}</h5>
            <p class="card-text">Name: {{ $category->nomcategorie }}</p>
            <p class="card-text">Description: {{ $category->description ?? 'No description' }}</p>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            
        </div>
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
