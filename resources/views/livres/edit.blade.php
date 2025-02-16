@extends('layout')

@section('title', 'Modifier Livre')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📚 Modifier un Livre</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Modifiez les informations du livre.</p>
        </div>

        {{-- Edit Book Form --}}
        <div class="card shadow animate__animated animate__fadeInUp">
            <div class="card-body">
                <form action="{{ route('livres.update', $livre) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nomlivre" class="form-label">Nom du Livre</label>
                        <input type="text" name="nomlivre" id="nomlivre" class="form-control" value="{{ old('nomlivre', $livre->nomlivre) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomauteur" class="form-label">Nom de l'Auteur</label>
                        <input type="text" name="nomauteur" id="nomauteur" class="form-control" value="{{ old('nomauteur', $livre->nomauteur) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $livre->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date_pub" class="form-label">Date de Publication</label>
                        <input type="date" name="date_pub" id="date_pub" class="form-control" value="{{ old('date_pub', $livre->date_pub) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="categorie_id" class="form-label">Catégorie</label>
                        <select name="categorie_id" id="categorie_id" class="form-control" required>
                            <option value="">--Sélectionner une Catégorie--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $livre->categorie_id ? 'selected' : '' }}>
                                    {{ $category->nomcategorie }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image actuelle:</label><br>
                        @if ($livre->image_path)
                            <img src="{{ asset('images/' . $livre->image_path) }}" alt="{{ $livre->nomlivre }}" style="width: 100px; height: auto;"><br>
                        @else
                            <p>Aucune image trouvée</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Télécharger une nouvelle image (facultatif)</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success shadow animate__animated animate__pulse animate__infinite">
                            <i class="fas fa-save me-2"></i>Mettre à jour
                        </button>
                        <a href="{{ route('livres.index') }}" class="btn btn-secondary shadow">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
