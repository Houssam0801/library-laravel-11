@extends('layout')

@section('title', 'Afficher Livre')

@section('content')
    <div class="container">
        <h1>Détails du Livre</h1>
        <div class="card">
            <h5 class="card-title text-center pt-3">ID: {{ $livre->id }}</h5>
            <hr>
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <p class="card-text"><strong>Titre:</strong> {{ $livre->nomlivre }}</p>
                    <p class="card-text"><strong>Auteur:</strong> {{ $livre->nomauteur }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $livre->description ?? 'Pas de description' }}</p>
                    <p class="card-text"><strong>Date de Publication:</strong> {{ $livre->date_pub }}</p>
                    <p class="card-text"><strong>Catégorie:</strong> {{ $category->nomcategorie ?? 'Pas de catégorie' }}</p>
                </div>
                <div>
                    @if ($livre->image_path)
                        <img src="{{ asset('images/' . $livre->image_path) }}" alt="{{ $livre->nomlivre }}"
                            style="width: 100px; height: auto;" class="img-fluid rounded shadow">
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-start gap-2 p-3">
                <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning w-auto">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <form action="{{ route('livres.destroy', $livre) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-auto">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>

        <a href="{{ route('livres.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a>
    </div>
@endsection
