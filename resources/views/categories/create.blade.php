@extends('layout')

@section('title', 'Ajouter categorie')

@section('content')
<div class="container">
    <h1>Create New Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomcategorie">Category Name</label>
            <input type="text" name="nomcategorie" id="nomcategorie" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
