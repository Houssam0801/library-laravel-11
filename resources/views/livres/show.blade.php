@extends('layout')

@section('title', 'Afficher Livre')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📚 Détails du Livre</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Consultez les détails du livre.</p>
        </div>

        {{-- Book Details Card --}}
        <div class="card shadow animate__animated animate__fadeInUp">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($livre->image_path)
                            <img src="{{ asset('images/' . $livre->image_path) }}" alt="{{ $livre->nomlivre }}" class="img-fluid rounded shadow">
                        @else
                            <img src="https://via.placeholder.com/150" alt="No pic" class="img-fluid rounded shadow">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h5 class="card-title"><strong>Titre:</strong> {{ $livre->nomlivre }}</h5>
                        <p class="card-text"><strong>Auteur:</strong> {{ $livre->nomauteur }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $livre->description ?? 'Pas de description' }}</p>
                        <p class="card-text"><strong>Date de Publication:</strong> {{ $livre->date_pub }}</p>
                        <p class="card-text"><strong>Catégorie:</strong> {{ $category->nomcategorie ?? 'Pas de catégorie' }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning shadow me-2">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <form action="{{ route('livres.destroy', $livre) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger shadow">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>

        {{-- Back to List Button --}}
        <div class="text-center mt-4 animate__animated animate__fadeInUp">
            <a href="{{ route('livres.index') }}" class="btn btn-secondary shadow">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </div>
@endsection
