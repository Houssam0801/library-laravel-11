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
            <div class="card-body p-4">
                <h3 class="card-title text-center">ID: {{ $category->id }}</h3>
                <hr>
                <h4 class="card-text"><strong>Nom :</strong> {{ $category->nomcategorie }}</h4>
                <p class="card-text"><strong>Description :</strong> {{ $category->description ?? 'Aucune description' }}</p>

                {{-- Livres Associated with Category --}}
                <div class="mt-4">
                    <h5><strong>Livres de cette catégorie:</strong></h5>
                    <div class="row">
                        @forelse($category->livres as $livre)
                            <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                                <a href="{{ route('livres.show', $livre) }}" class="text-decoration-none">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $livre->nomlivre }}</p>
                                                <p class="text-muted mb-0">{{ $livre->nomauteur }}</p>
                                                <p class="text-muted mb-0">{{ $livre->date_pub }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p>Aucun livre disponible dans cette catégorie.</p>
                        @endforelse
                    </div>
                </div>

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
