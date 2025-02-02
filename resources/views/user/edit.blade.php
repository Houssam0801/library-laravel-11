@extends('layout')

@section('title', 'Modifier le Profil')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Modifier le Profil</h4>
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

                        <!-- Formulaire de modification du profil -->
                        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>

                            <!-- Photo de Profil -->
                            <div class="mb-3">
                                <label for="profile_photo" class="form-label fw-bold">Photo de Profil</label>
                                <input type="file" class="form-control" id="profile_photo" name="profile_photo">
                                @if ($user->profile_photo)
                                    <div class="mt-3 text-center">
                                        <img src="{{ asset($user->profile_photo) }}" alt="Photo de Profil" class="img-thumbnail rounded-circle shadow" style="width: 150px; height: 150px;">
                                    </div>
                                @endif
                            </div>

                            <!-- Boutons -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Mettre à Jour
                                </button>
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">
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
