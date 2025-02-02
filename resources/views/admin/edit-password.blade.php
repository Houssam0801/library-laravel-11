@extends('layout')

@section('title', 'Modifier le Mot de Passe Admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-dark text-white text-center">
                        <h4 class="mb-0">Modifier le Mot de Passe Admin</h4>
                    </div>
                    <div class="card-body">
                        <!-- Affichage des erreurs -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formulaire de modification du mot de passe -->
                        <form action="{{ route('admin.update-password') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Mot de Passe Actuel -->
                            <div class="mb-3">
                                <label for="current_password" class="form-label fw-bold">Mot de Passe Actuel</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                            </div>

                            <!-- Nouveau Mot de Passe -->
                            <div class="mb-3">
                                <label for="new_password" class="form-label fw-bold">Nouveau Mot de Passe</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>

                            <!-- Confirmation du Nouveau Mot de Passe -->
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label fw-bold">Confirmer le Nouveau Mot de Passe</label>
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                            </div>

                            <!-- Boutons -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fas fa-key"></i> Mettre à Jour
                                </button>
                                <a href="{{ route('admin.profile') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Annuler
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
