@extends('layout')

@section('title', 'Tableau de Bord Admin')

@section('content')
    <div class="container mt-4">
        {{-- Creative Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">Tableau de Bord Administrateur</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Bienvenue sur votre espace de gestion</p>
            <div class="mt-3">
                <span class="d-inline-block animate__animated animate__bounce animate__delay-1s">📊</span>
                <span class="d-inline-block animate__animated animate__bounce animate__delay-2s">📚</span>
                <span class="d-inline-block animate__animated animate__bounce animate__delay-3s">👤</span>
            </div>
        </div>

        <div class="row text-center animate__animated animate__fadeInUp">
            {{-- Users Card --}}
            <div class="col-md-3 mb-4">
                <div class="card border-start border-primary border-3 shadow animate__animated animate__zoomIn" style="height: 150px;">
                    <div class="card-body p-2">
                        <h5 class="card-title text-primary mb-2"><i class="fas fa-users me-2"></i>Utilisateurs</h5>
                        <p class="fs-3 fw-bold">{{ $userCount }}</p>
                        <p class="text-muted small">Total utilisateurs inscrits</p>
                    </div>
                </div>
            </div>
        
            {{-- Reservations Card --}}
            <div class="col-md-3 mb-4">
                <div class="card border-start border-success border-3 shadow animate__animated animate__zoomIn" style="height: 150px;">
                    <div class="card-body p-2">
                        <h5 class="card-title text-success mb-2"><i class="fas fa-calendar-check me-2"></i>Réservations</h5>
                        <p class="fs-3 fw-bold">{{ $reservationCount }}</p>
                        <p class="text-muted small">Total réservations effectuées</p>
                    </div>
                </div>
            </div>
        
            {{-- Livres Card --}}
            <div class="col-md-3 mb-4">
                <div class="card border-start border-warning border-3 shadow animate__animated animate__zoomIn" style="height: 150px;">
                    <div class="card-body p-2">
                        <h5 class="card-title text-warning mb-2"><i class="fas fa-book me-2"></i>Livres</h5>
                        <p class="fs-3 fw-bold">{{ $bookCount }}</p>
                        <p class="text-muted small">Total livres disponibles</p>
                    </div>
                </div>
            </div>
        
            {{-- Categories Card --}}
            <div class="col-md-3 mb-4">
                <div class="card border-start border-danger border-3 shadow animate__animated animate__zoomIn" style="height: 150px;">
                    <div class="card-body p-2">
                        <h5 class="card-title text-danger mb-2"><i class="fas fa-tags me-2"></i>Catégories</h5>
                        <p class="fs-3 fw-bold">{{ $categoryCount }}</p>
                        <p class="text-muted small">Total catégories disponibles</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dernières Réservations Section --}}
        <div class="d-flex justify-content-between align-items-center mt-5 animate__animated animate__fadeInLeft">
            <h2><i class="fas fa-history me-2"></i>Dernières Réservations</h2>
            <a href="{{ route('admin.reservations') }}" class="btn btn-primary shadow animate__animated animate__pulse animate__infinite">
                <i class="fas fa-eye me-2"></i>Voir et Gérer les Réservations
            </a>
        </div>

        @if ($latestReservations->isEmpty())
            <div class="alert alert-warning text-center mt-3 animate__animated animate__fadeIn">
                <i class="fas fa-exclamation-circle me-2"></i>Aucune réservation récente trouvée.
            </div>
        @else
            <div class="table-responsive mt-3 animate__animated animate__fadeInUp">
                <table class="table table-bordered table-hover shadow">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Utilisateur</th>
                            <th>Livre</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestReservations as $reservation)
                            <tr class="animate__animated animate__fadeIn">
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ optional($reservation->livre)->nomlivre ?? 'Livre supprimé' }}</td>
                                <td>{{ $reservation->date_debut }}</td>
                                <td>{{ $reservation->date_fin }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge
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

        {{-- Derniers Utilisateurs Section --}}
        <div class="d-flex justify-content-between align-items-center mt-5 animate__animated animate__fadeInRight">
            <h2><i class="fas fa-user-clock me-2"></i>Derniers Utilisateurs</h2>
            <a href="{{ route('admin.profiles') }}" class="btn btn-primary shadow animate__animated animate__pulse animate__infinite">
                <i class="fas fa-eye me-2"></i>Voir et Gérer les Utilisateurs
            </a>
        </div>

        @if ($latestUsers->isEmpty())
            <div class="alert alert-warning text-center mt-3 animate__animated animate__fadeIn">
                <i class="fas fa-exclamation-circle me-2"></i>Aucun nouvel utilisateur trouvé.
            </div>
        @else
            <div class="table-responsive mt-3 animate__animated animate__fadeInUp">
                <table class="table table-bordered table-hover shadow">
                    <thead class="table-info text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestUsers as $user)
                            <tr class="animate__animated animate__fadeIn">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge
                                        @if ($user->role == 'admin') bg-danger
                                        @else bg-secondary @endif">
                                        {{ ucfirst($user->role) }}
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
