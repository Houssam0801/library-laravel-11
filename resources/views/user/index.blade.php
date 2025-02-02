@extends('layout')

@section('title', 'Profil Utilisateur')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Profil Utilisateur</h1>

        <!-- Informations du Profil -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <!-- Profil Image -->
                <div class="me-4 text-center">
                    <img src="{{ asset($user->profile_photo) }}" alt="pic de Profil" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                </div>

                <!-- User Info -->
                <div>
                    <h5 class="card-title">Détails du Profil</h5>
                    <p class="card-text"><strong>Nom :</strong> {{ $user->name }}</p>
                    <p class="card-text"><strong>Email :</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Rôle :</strong> {{ $user->role }}</p>
                    <a href="{{ route('user.edit') }}" class="btn btn-primary">Modifier le Profil</a>
                    <a href="{{ route('user.edit-password') }}" class="btn btn-warning">Modifier le Mot de Passe</a>                </div>
            </div>
        </div>

        <!-- Réservations de l'Utilisateur -->
        <h3 class="mb-3">Vos Réservations</h3>
        @if ($reservations->isEmpty())
            <p class="text-muted">Vous n'avez aucune réservation.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Livre</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->livre->nomlivre }}</td>
                                <td>{{ $reservation->date_debut }}</td>
                                <td>{{ $reservation->date_fin }}</td>
                                <td class="text-center">
                                    <span class="badge
                                        @if ($reservation->status == 'approved') bg-success
                                        @elseif($reservation->status == 'rejected') bg-danger
                                        @else bg-warning @endif">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
