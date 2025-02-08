@extends('layout')

@section('title', 'Gérer les Réservations')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Gérer les Réservations</h1>

        {{-- Pending Reservations Table --}}
        <h2>Réservations en Attente</h2>
        @if ($pendingReservations->isEmpty())
            <div class="alert alert-warning text-center">
                Aucune réservation en attente trouvée.
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
                        @foreach ($pendingReservations as $reservation)
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
                                                <option value="pending" selected>En attente</option>
                                                <option value="approved">Approuvé</option>
                                                <option value="rejected">Rejeté</option>
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

        {{-- Approved Reservations Table --}}
        <h2 class="mt-5">Réservations Approuvées</h2>
        @if ($approvedReservations->isEmpty())
            <div class="alert alert-warning text-center">
                Aucune réservation approuvée trouvée.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-success text-center">
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
                        @foreach ($approvedReservations as $reservation)
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
                                <td class="text-center">
                                    <form action="{{ route('admin.updateReservationStatus', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="btn btn-secondary">Remettre en Attente</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- Rejected Reservations Table --}}
        <h2 class="mt-5">Réservations Rejetées</h2>
        @if ($rejectedReservations->isEmpty())
            <div class="alert alert-warning text-center">
                Aucune réservation rejetée trouvée.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-danger text-center">
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
                        @foreach ($rejectedReservations as $reservation)
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
                                <td class="text-center">
                                    <form action="{{ route('admin.updateReservationStatus', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="btn btn-secondary">Remettre en Attente</button>
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
