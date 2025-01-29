@extends('layout')

@section('title', 'Gérer les Profils')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Gérer les Profils</h1>
        <p class="text-muted">Bienvenue dans la gestion des profils administrateurs ! Ici, vous pouvez gérer les utilisateurs.</p>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
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
                            <td>
                                <a href="{{ route('admin.viewProfile', $user->id) }}" class="btn btn-info btn-sm">Voir plus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
