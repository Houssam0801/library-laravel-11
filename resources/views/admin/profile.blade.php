@extends('layout')

@section('title', 'Profile Admin')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">Profile Admin</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Gérez les informations de votre profil</p>
        </div>

        {{-- Profile Card --}}
        <div class="card mb-4 shadow animate__animated animate__zoomIn">
            <div class="card-body d-flex align-items-center">
                {{-- Profile Image --}}
                <div class="me-4 text-center">
                    <img src="{{ asset($user->profile_photo) }}" alt="pic de Profil" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                </div>

                {{-- User Info --}}
                <div>
                    <h5 class="card-title text-primary mb-3">Détails du Profil Admin</h5>
                    <p class="card-text"><strong><i class="fas fa-user me-2"></i>Nom :</strong> {{ $user->name }}</p>
                    <p class="card-text"><strong><i class="fas fa-envelope me-2"></i>Email :</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong><i class="fas fa-user-tag me-2"></i>Rôle :</strong> {{ $user->role }}</p>

                    {{-- Buttons --}}
                    <div class="mt-4">
                        <a href="{{ route('admin.edit-profile') }}" class="btn btn-primary shadow animate__animated animate__pulse animate__infinite me-3">
                            <i class="fas fa-edit me-2"></i>Modifier le Profil
                        </a>
                        <a href="{{ route('admin.edit-password') }}" class="btn btn-warning shadow animate__animated animate__pulse animate__infinite">
                            <i class="fas fa-lock me-2"></i>Modifier le Mot de Passe
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
