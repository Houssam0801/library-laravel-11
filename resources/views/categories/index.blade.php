@extends('layout')

@section('title', 'Liste des catégories')

@section('content')
    <div class="container mt-4">
        {{-- Page Title --}}
        <div class="text-center mb-5 animate__animated animate__fadeInDown">
            <h1 class="display-4 fw-bold">📚 Liste des Catégories</h1>
            <p class="lead text-muted animate__animated animate__fadeIn">Gérez les catégories de livres disponibles.</p>
        </div>

        {{-- Create Category Button --}}
        <div class="text-center mb-4 animate__animated animate__fadeInLeft">
            <a href="{{ route('categories.create') }}" class="btn btn-primary shadow animate__animated animate__pulse animate__infinite">
                <i class="fas fa-plus me-2"></i>Créer une Nouvelle Catégorie
            </a>
        </div>

        {{-- Success Alert --}}
        @if (session('success'))
            <div class="alert alert-success text-center animate__animated animate__fadeIn">
                {{ session('success') }}
            </div>
        @endif

        {{-- Categories Table --}}
        <div class="table-responsive animate__animated animate__fadeInUp">
            <table class="table table-bordered table-hover shadow">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="animate__animated animate__fadeIn">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->nomcategorie }}</td>
                            <td>{{ $category->description ?? 'Pas de description' }}</td>
                            <td class="text-center">
                                {{-- View Button --}}
                                <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm shadow me-2">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Edit Button --}}
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm shadow me-2">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- Delete Button --}}
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
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
        </div>

        {{-- Pagination --}}
        <div class="mt-4 animate__animated animate__fadeInUp">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
