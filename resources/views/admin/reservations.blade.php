@extends('layout')

@section('title', 'Gérer les Réservations')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Gérer les Réservations</h1>

        <!-- Formulaire de recherche par statut -->
        <div class="d-flex justify-content-end mb-4">
            <form action="{{ route('admin.reservations') }}" method="GET" class="d-flex">
                <div class="me-2">
                    <label for="status" class="form-label">Filtrer par statut :</label>
                    <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                        <option value="">Tous</option>
                        <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>En attente</option>
                        <option value="approved" {{ $status == 'approved' ? 'selected' : '' }}>Approuvé</option>
                        <option value="rejected" {{ $status == 'rejected' ? 'selected' : '' }}>Rejeté</option>
                    </select>
                </div>
            </form>
        </div>

        <hr>

        <!-- Tableau des réservations -->
        @if ($reservations->isEmpty())
            <div class="alert alert-warning text-center">
                Aucune réservation trouvée.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Utilisateur</th>
                            <th>Livre</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
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
                                <td>
                                    <form action="{{ route('admin.updateReservationStatus', $reservation->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <select name="status" class="form-select">
                                                <option value="pending"
                                                    {{ $reservation->status == 'pending' ? 'selected' : '' }}>En attente
                                                </option>
                                                <option value="approved"
                                                    {{ $reservation->status == 'approved' ? 'selected' : '' }}>Approuvé
                                                </option>
                                                <option value="rejected"
                                                    {{ $reservation->status == 'rejected' ? 'selected' : '' }}>Rejeté
                                                </option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
@endsection
