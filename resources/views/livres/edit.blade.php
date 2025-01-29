@extends('layout')

@section('title', 'Modifier Livre')

@section('content')
    <div class="container">
        <h1>Modifier un Livre</h1>
        <form action="{{ route('livres.update', $livre) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nomlivre">Nom du Livre</label>
                <input type="text" name="nomlivre" id="nomlivre" class="form-control" value="{{ old('nomlivre', $livre->nomlivre) }}" required>
            </div>
            <div class="form-group">
                <label for="nomauteur">Nom de l'Auteur</label>
                <input type="text" name="nomauteur" id="nomauteur" class="form-control" value="{{ old('nomauteur', $livre->nomauteur) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $livre->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="date_pub">Date de Publication</label>
                <input type="date" name="date_pub" id="date_pub" class="form-control" value="{{ old('date_pub', $livre->date_pub) }}" required>
            </div>
            <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control" required>
                    <option value="">--Sélectionner une Catégorie--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $livre->categorie_id ? 'selected' : '' }}>
                            {{ $category->nomcategorie }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                @if ($livre->image_path)
                    <label>Image actuelle:</label><br>
                    <img src="{{ asset('images/' . $livre->image_path) }}" alt="{{ $livre->nomlivre }}" style="width: 100px; height: auto;"><br>
                @else
                    <p>Aucune image trouvée</p>
                @endif
                <label for="image">Télécharger une nouvelle image (facultatif)</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*"> 
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
