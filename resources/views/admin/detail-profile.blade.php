@extends('layout')

@section('title', 'Voir le Profil')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h1 class="mb-4 text-primary text-center">Profil Utilisateur</h1>
            <div class="card-body d-flex align-items-center">
                <!-- Image de Profil -->
                <div class="me-4 text-center">
                    <img src="{{ asset($user->profile_photo) }}" alt="Pic de Profil" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                </div>

                <!-- Infos Utilisateur -->
                <div class="w-100">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>ID :</strong> {{ $user->id }}</p>
                            <p><strong>Nom :</strong> {{ $user->name }}</p>
                            <p><strong>Email :</strong> {{ $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Rôle :</strong> <span class="badge bg-info">{{ $user->role }}</span></p>
                            <p><strong>Créé le :</strong> {{ $user->created_at }}</p>
                            <p><strong>Mis à jour le :</strong> {{ $user->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton Retour -->
            <div class="text-center mt-4">
                <a href="{{ route('admin.profiles') }}" class="btn btn-secondary">⬅️ Retour aux Profils</a>
            </div>
        </div>
    </div>
@endsection
