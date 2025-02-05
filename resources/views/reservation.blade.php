@extends('layout')

@section('title', 'Réserver le Livre')

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
                <h2 class="mb-0">📖 Réserver un Livre</h2>
            </div>

            <div class="card-body p-4">
                <div class="row g-4 align-items-start">
                    <div class="col-md-5 text-center">
                        <img src="{{ asset('images/' . $livre->image_path) }}" class="img-fluid rounded-3 shadow-sm mb-3"
                            alt="{{ $livre->nomlivre }}" style="max-width: 55%; height: auto;">
                        <h4 class="fw-bold text-primary">{{ $livre->nomlivre }}</h4>
                        <p class="text-muted mb-1"><strong>Auteur :</strong> {{ $livre->nomauteur }}</p>
                        <p class="text-muted mb-1"><strong>Catégorie :</strong> {{ $livre->categorie->nomcategorie }}</p>
                        <p class="text-muted"><strong>Date de publication :</strong> {{ $livre->date_pub }}</p>
                    </div>

                    <div class="col-md-7">
                        @auth
                            <div class="alert alert-light border">
                                <h5 class="mb-2"><i class="bi bi-person-circle"></i> Vos informations</h5>
                                <p class="mb-1"><strong>Nom :</strong> {{ Auth::user()->name }}</p>
                                <p class="mb-0"><strong>Email :</strong> {{ Auth::user()->email }}</p>
                            </div>
                        @else
                            <div class="alert alert-warning text-center">
                                <p><em>Veuillez vous connecter pour réserver un livre.</em></p>
                            </div>
                        @endauth

                        <div class="p-3 bg-light rounded-3">
                            <form action="{{ route('reserver', $livre->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="date_debut" class="form-label fw-bold">📅 Date de début</label>
                                    <input type="date" name="date_debut" id="date_debut"
                                        class="form-control rounded-3 shadow-sm" required>
                                </div>
                                <div class="mb-3">
                                    <label for="date_fin" class="form-label fw-bold">📅 Date de fin</label>
                                    <input type="date" name="date_fin" id="date_fin"
                                        class="form-control rounded-3 shadow-sm" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100 fw-bold rounded-3">
                                    📚 Réserver maintenant
                                </button>
                            </form>
                        </div>

                        <!-- Retour Button -->
                        <div class="mt-3">
                            <a href="{{ route('tousLivres') }}" class="btn btn-secondary w-100 fw-bold rounded-3">
                                ⬅️ Retour à tous les livres
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
