@extends('layout')

@section('title', 'Profil Admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Profil Admin</h1>

        <!-- Informations du Profil -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <!-- Profil Image -->
                <div class="me-4 text-center">
                    <img src="{{ asset($user->profile_photo) }}" alt="pic de Profil" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                </div>

                <!-- User Info -->
                <div>
                    <h5 class="card-title">Détails du Profil Admin</h5>
                    <p class="card-text"><strong>Nom :</strong> {{ $user->name }}</p>
                    <p class="card-text"><strong>Email :</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Rôle :</strong> {{ $user->role }}</p>
                    <a href="{{ route('admin.edit-profile') }}" class="btn btn-primary">Modifier le Profil</a>
                    <a href="{{ route('admin.edit-password') }}" class="btn btn-warning">Modifier le Mot de Passe</a>
                </div>
            </div>
        </div>
    </div>
@endsection