@extends('layout')

@section('title', 'Gérer les Profils')

@section('content')
    <div class="container mt-4">
        {{-- Success Alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Error Alert --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📋 Gérer les Profils</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Bienvenue dans la gestion des profils administrateurs ! Ici, vous pouvez gérer les utilisateurs.</p>
        </div>

        {{-- Table --}}
        <div class="table-responsive animate__animated animate__fadeInUp">
            <table class="table table-bordered table-hover shadow">
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
                        <tr class="animate__animated animate__fadeIn">
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
                                    <button type="submit" class="btn btn-primary btn-sm shadow">Enregistrer</button>
                                </form>
                            </td>
                            <td class="text-center">
                                {{-- View Button --}}
                                <a href="{{ route('admin.viewProfile', $user->id) }}" class="btn btn-info btn-sm shadow me-2">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Delete Button --}}
                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ? Cette action est irréversible.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow">
                                        <i class="fas fa-trash"></i>
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
