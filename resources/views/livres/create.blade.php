@extends('layout')

@section('title', 'Ajouter Livre')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📚 Ajouter un Nouveau Livre</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Ajoutez un nouveau livre à la bibliothèque.</p>
        </div>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger my-2 animate__animated animate__fadeIn">
                <strong>⚠️ Erreurs de validation :</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Create Book Form --}}
        <div class="card shadow animate__animated animate__fadeInUp">
            <div class="card-body">
                <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nomlivre" class="form-label">Nom du Livre</label>
                        <input type="text" name="nomlivre" id="nomlivre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nomauteur" class="form-label">Nom de l'Auteur</label>
                        <input type="text" name="nomauteur" id="nomauteur" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date_pub" class="form-label">Date de Publication</label>
                        <input type="date" name="date_pub" id="date_pub" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="categorie_id" class="form-label">Catégorie</label>
                        <select name="categorie_id" id="categorie_id" class="form-control" required>
                            <option value="">--Sélectionner une Catégorie--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nomcategorie }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image de Couverture</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="btn btn-primary shadow animate__animated animate__pulse animate__infinite">
                            <i class="fas fa-plus me-2"></i>Créer
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
