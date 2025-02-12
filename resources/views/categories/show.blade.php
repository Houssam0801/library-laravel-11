@extends('layout')

@section('title', 'Afficher catégorie')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📚 Détails de la Catégorie</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Consultez les détails de la catégorie.</p>
        </div>

        {{-- Category Details Card --}}
        <div class="card shadow animate__animated animate__fadeInUp">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $category->id }}</h5>
                <p class="card-text"><strong>Nom :</strong> {{ $category->nomcategorie }}</p>
                <p class="card-text"><strong>Description :</strong> {{ $category->description ?? 'Aucune description' }}</p>
                <div class="text-center">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning shadow me-2">
                        <i class="fas fa-edit me-2"></i>Modifier
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow">
                            <i class="fas fa-trash me-2"></i>Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Back to List Button --}}
        <div class="text-center mt-4 animate__animated animate__fadeInUp">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary shadow">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </div>
@endsection
