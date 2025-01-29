@extends('layout')

@section('title', 'Ajouter Livre')

@section('content')
    <div class="container">
        <h1>Ajouter un Nouveau Livre</h1>
        <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomlivre">Nom du Livre</label>
                <input type="text" name="nomlivre" id="nomlivre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nomauteur">Nom de l'Auteur</label>
                <input type="text" name="nomauteur" id="nomauteur" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="date_pub">Date de Publication</label>
                <input type="date" name="date_pub" id="date_pub" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control" required>
                    <option value="">--Sélectionner une Catégorie--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nomcategorie }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
