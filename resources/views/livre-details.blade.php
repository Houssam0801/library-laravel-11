@extends('layout')

@section('title', 'Détails du Livre')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header text-white text-center bg-primary rounded-top-4">
                <h2 class="mb-0">📖 Détails du Livre</h2>
            </div>

            <div class="card-body p-4">
                <div class="row g-4 align-items-start">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('images/' . $livre->image_path) }}" class="img-fluid rounded-3 shadow-sm mb-3"
                            alt="{{ $livre->nomlivre }}" style="max-width: 65%; height: auto;">
                    </div>

                    <div class="col-md-8">
                        <h2 class="fw-bold text-primary">{{ $livre->nomlivre }}</h2>
                        <p class="text-muted mb-2"><strong>🖋 Auteur :</strong> {{ $livre->nomauteur }}</p>
                        <p class="text-muted mb-2"><strong>📚 Catégorie :</strong> {{ $livre->categorie->nomcategorie }}</p>
                        <p class="text-muted mb-2"><strong>📅 Date de publication :</strong> {{ $livre->date_pub }}</p>
                        <p class="text-dark"><strong>📝 Description :</strong> {{ $livre->description }}</p>

                        <div class="mt-3">
                            @auth
                                <a href="{{ route('livre.reserver', $livre->id) }}" class="btn btn-success fw-bold me-2">
                                    📚 Réserver
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-warning fw-bold">
                                    🔐 Connectez-vous pour réserver
                                </a>
                            @endauth
                        </div>

                        <!-- Retour Button -->
                        <div class="mt-3">
                            <a href="{{ route('tousLivres') }}" class="btn btn-secondary fw-bold rounded-3">
                                ⬅️ Retour à tous les livres
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
