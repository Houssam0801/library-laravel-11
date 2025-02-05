@extends('layout')

@section('title', 'Gérer les Profils')

@section('content')
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 class="mb-3">📋 Gérer les Profils</h1>
        <p class="text-muted">Bienvenue dans la gestion des profils administrateurs ! Ici, vous pouvez gérer les utilisateurs.</p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('admin.updateRole', $user->id) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" class="form-select form-select-sm me-2">
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Utilisateur</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.viewProfile', $user->id) }}" class="btn btn-info btn-sm"><i class="lni lni-eye"></i></a>
                                <!-- Bouton Supprimer -->
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ? Cette action est irréversible.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    X
                                 </button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
