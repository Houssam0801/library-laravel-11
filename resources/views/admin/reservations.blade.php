@extends('layout')

@section('title', 'Gérer les Réservations')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📋 Gérer les Réservations</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Bienvenue dans la gestion des réservations !</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center animate__animated animate__fadeIn">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pending Reservations Table --}}
        <h2 class="mb-4 animate__animated animate__fadeInLeft">Réservations en Attente</h2>
        @if ($pendingReservations->isEmpty())
            <div class="alert alert-warning text-center animate__animated animate__fadeIn">
                Aucune réservation en attente trouvée.
            </div>
        @else
            <div class="table-responsive animate__animated animate__fadeInUp">
                <table class="table table-bordered table-hover shadow">
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
                                            <button type="submit" class="btn btn-primary shadow">Mettre à jour</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pendingReservations->links() }}
            </div>
        @endif

        {{-- Approved Reservations Table --}}
        <h2 class="mt-5 mb-4 animate__animated animate__fadeInLeft">Réservations Approuvées</h2>
        @if ($approvedReservations->isEmpty())
            <div class="alert alert-warning text-center animate__animated animate__fadeIn">
                Aucune réservation approuvée trouvée.
            </div>
        @else
            <div class="table-responsive animate__animated animate__fadeInUp">
                <table class="table table-bordered table-hover shadow">
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
                                <td class="text-center px-5">
                                    <!-- Form to delete the reservation -->
                                    <form action="{{ route('admin.retourAndDelete', $reservation->id) }}" method="POST"
                                        onsubmit="return confirm('Confirmez-vous le retour de ce livre ? Cette réservation sera supprimée.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning shadow">Retour</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- Rejected Reservations Table --}}
        <h2 class="mt-5 mb-4 animate__animated animate__fadeInLeft">Réservations Rejetées</h2>
        @if ($rejectedReservations->isEmpty())
            <div class="alert alert-warning text-center animate__animated animate__fadeIn">
                Aucune réservation rejetée trouvée.
            </div>
        @else
            <div class="table-responsive animate__animated animate__fadeInUp">
                <table class="table table-bordered table-hover shadow">
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
                                <td class="text-center">
                                    <form action="{{ route('admin.updateReservationStatus', $reservation->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="btn btn-secondary shadow">Remettre en Attente</button>
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
